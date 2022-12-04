<?php
	session_start();
	require "fpdf181/fpdf.php";
	include("dbconn.php");

	if(!isset($_SESSION['sessionID'])) {
		header('Location: login.php');
	}

	$oldCartID = base64_decode($_GET["oldCartID"]);

	class myPDF extends FPDF {
		function header() {
			$this->Image('images/mage.png',15,12,35);
			$this->SetFont('Times','B',16);
			$this->Cell(0,5,'Invoice',0,0,'C');
			$this->setXY(-355,40);
			$this->SetFont('Times','',13);
			$this->Cell(0,5,'Dear customer,',0,0,'C');
			$this->Ln();
			$this->setXY(-320,45);
			$this->SetFont('Times','',12);
			$this->Cell(0,10,'Thank you for purchasing our games',0,0,'C');
			$this->Ln();
			
		}

		function content() {
			$this->setXY(-335,70);
			$this->SetFont('Times','B',13);
			$this->Cell(0,10,'Your order information,',0,0,'C');
		}

		function footer() {
			$copyright = "®2018 Mage Entertainment. All Rights Reserved. mage.com and the Mage logo are trademarks of Mage Entertainment in Malaysia and/or other countries.";
			$this->setY(-8);
			$this->SetFont('Arial','',8);
			$this->Cell(0,10,$copyright,0,0,'C');
			$this->setY(-15);
			$this->SetFont('Arial','',8);
			$this->Cell(0,10,'Page'.$this->PageNo(),0,0,'C');
		}

		function headerTable() {
			$this->setY(85);
			$this->SetFont('Times','B',12);
			$this->Cell(100,10,'Product',1,0,'C');
			$this->Cell(30,10,'Quantity',1,0,'C');	
			$this->Cell(40,10,'Price',1,0,'C');						
			$this->Ln();
		}	
	}	

	$pdf = new myPDF();
	
	$pdf->AliasNbPages();
	$pdf->AddPage('P','A4',0);			

	$userID = $_SESSION['userID'];

	$sql0 = "SELECT * FROM cart WHERE cartID = '$oldCartID'";
	$sqlQuery0 = mysqli_query($dbconn, $sql0) or die("Statement Error");
	$row0 = mysqli_fetch_array($sqlQuery0);

	$pdf->setXY(-310,60);
	$pdf->SetFont('Times','',13);
	$pdf->Cell(0,5,"Customer Name: ".$row0["shipName"],0,1,'C');
	$pdf->Ln();

	$pdf->content();
	$pdf->headerTable();

	$sql = "SELECT * FROM cartList RIGHT JOIN product ON cartList.prodID = product.prodID WHERE cartID = '$oldCartID'";
	$sqlQuery = mysqli_query($dbconn, $sql) or die("Statement Error");	

	$totalPrice = 0;
	
	while($row = mysqli_fetch_array($sqlQuery)) {
		$totProdPrice = ($row['quantity']*$row['prodPrice']);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(100,10,$row['prodName'],1,0,'C');
		$pdf->Cell(30,10,$row['quantity'],1,0,'C');	
		$pdf->Cell(40,10,$totProdPrice,1,0,'C');				
		$pdf->Ln();

		$totalPrice += $totProdPrice;
	}

	$pdf->Cell(130,10,'Total Price',1,0,'C');	
	$pdf->Cell(40,10,$totalPrice,1,0,'C');

	$pdf->Output();
?>