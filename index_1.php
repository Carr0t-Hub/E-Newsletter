<?php include("functions/function.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BAR E-Newsletter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="vendor/dist/style.css">
</head>
<style>
	.text_description {
		background-color: #fff;
		text-align: center;
		margin-left: auto;
		margin-right: auto;
	}

	.text_left {
		background-color: #fff;
		text-align: left;
	}

	.text_right {
		background-color: #fff;
		text-align: right;

	}

	.text_news {
		font-size: 20px;
		color: #198754;
		font-family: "Outfit", Helvetica, Arial, sans-serif;
	}

	.text_desc {
		font-size: 18px !important;
		color: #000;
	}

	.text_news_header {
		position: relative;
		font-size: 35px;
		color: #198754;
		display: inline-block;
		font-family: "Outfit", Helvetica, Arial, sans-serif;
	}

	.button_more {
		background-color: #0c5935;
		border: none;
		color: #fff;
		padding: 10px 20px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		margin: 4px 2px;
		cursor: pointer;
		border-radius: 25px;
	}

	.button_more:hover {
		background-color: #198754;
		color: #fff;
	}

	.button_more_more {
		background-color: #0c5935;
		border: none;
		color: #fff;
		padding: 8px 16px;
		float: right;
		margin: -10px 0px -10px 0px;
		cursor: pointer;
		border-radius: 25px;
	}

	.button_more_more:hover {
		background-color: #198754;
		color: #fff;
	}

	.center {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 100%;
	}

	footer {
		background-color: #157139;
		max-width: 650px;
		margin-left: auto;
		margin-right: auto;
		width: 100%;
		min-height: 100px;
	}

	.footer-logo {
		margin-top: -30px;
		padding: 5px;
	}

	.footer-desc {
		text-align: right;
		font-size: 12px;
	}

	.footer-subscribe {
		border-radius: 10%;
	}

	.subscribe_btn {
		background-color: #fff;
		border: none;
		color: #157139;
		padding: 8px 16px;
		float: left;
		margin: -15px 0px -10px 0px;
		cursor: pointer;
		border-radius: 25px;
		font-weight: bold;
	}

	.social-icons {
		color: white;
	}

	.social-icons a:link {
		color: black;
	}

	.social-icons a:visited {
		color: black;
	}

	.social-icons a:active {
		color: white;
	}

	.social-icons a:hover {
		color: black !important;
	}

	.padding_master {
		padding: 50px 10px 50px 30px;
	}

	.padding_master2 {
		padding: 60px 10px 40px 30px;
	}


	/* The Modal (background) */
	/* .modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%; 
  overflow: auto;
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
} */

	/* Modal Content */
	/* .modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
	/* @-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
} */

	/* The Close Button */
	/* .close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
} */
</style>

<body>

	<div class="modal fade" id="subscribe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Subscribe Now!</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Form Goes here</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_GET['issue_id'])) {
		$isyu_id = $_GET['issue_id'];
		$data = getArticlebyIssue($pdo, $isyu_id);
	} else {
		$isyu_id = '';
		$data = getArticle($pdo);
	}
	$issuedata = viewIssue($pdo, $isyu_id);
	?>
	<div class="container">
		<div class="container container_letter">

			<?php
			$ctr = 1;
			foreach ($data as $v):

				// WAG IDEDELETE HEHEHEHEHEHEHEHEHEHEHEHEHE
				$id_img = $v['header_image'];
				$img_query = "SELECT * FROM attachments WHERE id=:id";
				$stmt_header = $pdo->prepare($img_query);
				$stmt_header->execute(['id' => $id_img]);
				$fetch = $stmt_header->fetchAll();
				// WAG IDEDELETE HEHEHEHEHEHEHEHEHEHEHEHEHE

				$file = $v['fileName'] . "_" . $v['fileSize'] . $v['fileID'] . "." . $v['fileExtension'];
				$path = "../BARPortal/uploads/newsletter/" . $file;

				$description = substr($v['description'], 0, 130) . '...';
				$lead = $v['newsletterlead'];
				$s1 = substr($description, 0, 150);
				$result1 = substr($s1, 0, strrpos($s1, ' '));

				$description_cover = substr($v['description'], 0, 200) . '...';
				$s2 = substr($description_cover, 0, 200);
				$result2 = substr($s2, 0, strrpos($s2, ' '));
				$newsletterid = $v['newsletterid'];
				if ($ctr == 1) {
			?>
					<?php
					foreach ($fetch as $row_img) {
						$file_header = $row_img['fileName'] . "_" . $row_img['size'] . $row_img['id'] . "." . $row_img['fileExtension'];
						$path_header = "../BARPortal/uploads/newsletter/" . $file_header;
					?>
						<img src="<?php echo $path_header; ?>" align="middle" alt="" class="center">
					<?php
					}
					?>
					<div class="row d-flex justify-content-between align-items-center text_description">
						<div class="col-sm-12 col-lg-12 cover_photo">
							<img style='height: 100%; width: 100%; object-fit: contain; padding: 20px 5px 5px 5px;' src="<?php echo $path; ?>"></h1>
						</div>
						<div class="col-sm-12 align-items-center col-lg-12  ">
							<div class="col-sm-12 col-lg-12">
								<center>
									<h1 class="text_news_header"><?= $v['title']; ?></h1><br>
								</center>
							</div>
							<div class="col-sm-12 col-lg-12" style="font-size: 18px;">
								<p>
									<?php
									echo $lead;
									//$result2 = str_replace("ckeditor/uploads/","../BARPortal/news_letter/ckeditor/uploads/",$result2);
									////echo str_replace("margin-left:0.5cm; margin-right:0cm","margin-left:0cm; margin-right:0.5cm",$description_uploads);
									//echo preg_replace("/<img[^>]+>/", "", $result2).'...';
									?>
								</p>
							</div>
						</div>
						<div class="offset-sm-4  col-sm-4 col-lg-4" style="padding-bottom: 10px;">
							<form action="view_letter.php" method="GET">
								<button type="submit" class="form-control button_more" value="<?php echo $newsletterid; ?>" name="newsLetterID">Read More</button>
							</form>
						</div>
					</div>
					<br>
				<?php
				} elseif ($ctr % 2 == 0) {
				?>
					<div class="row d-flex justify-content-between align-items-center  text_right">
						<div class="col-sm-6 align-items-center col-lg-6 ">
							<div class="col-sm-12 col-lg-12 ">
								<h1 class=" text_news"><?= $v['title']; ?></h1><br>
								<?php
								echo $lead;
								//$description_uploads = str_replace("ckeditor/uploads/","../BARPortal/news_letter/ckeditor/uploads/",$description);
								////echo str_replace("margin-left:0.5cm; margin-right:0cm","margin-left:0cm; margin-right:0.5cm",$description_uploads);
								//echo preg_replace("/<img[^>]+>/", "", $description_uploads);
								?>
							</div>
							<div class="offset-sm-7  align-items-center col-lg-5" style="padding-bottom: 10px;">
								<form action="view_letter.php" method="GET">
									<button type="submit" class="form-control button_more" value="<?php echo $newsletterid; ?>" name="newsLetterID">Read More</button>
								</form>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 ">
							<h1 class="fs-2 text_news"> <img width="100%" height="100%" style="object-fit: contain;" src="<?php echo $path; ?>"></h1>
						</div>
					</div>

				<?php
				} else {
				?>
					<div class="row d-flex justify-content-between align-items-center  text_left">
						<div class="col-sm-6 col-lg-6">
							<h1 class="fs-2 text-dark"> <img width="100%" height="100%" src="<?php echo $path; ?>"></h1>
						</div>
						<div class="col-sm-6 col-lg-6 ">
							<div class="col-sm-12 col-lg-12 ">
								<h1 class="text_news"><?= $v['title']; ?></h1><br>
								<?php
								echo $lead;
								//$description_uploads = str_replace("ckeditor/uploads/","../BARPortal/news_letter/ckeditor/uploads/",$description);
								////echo str_replace("margin-left:0.5cm; margin-right:0cm","margin-left:0cm; margin-right:0.5cm",$description_uploads);
								//echo preg_replace("/<img[^>]+>/", "", $description_uploads);
								?>
							</div>
							<div class="col-sm-4 align-items-center col-lg-5 " style="padding-bottom: 10px;">
								<form action="view_letter.php" method="GET">
									<button type="submit" class="form-control button_more" value="<?php echo $newsletterid; ?>" name="newsLetterID">Read More</button>
								</form>
							</div>
						</div>
					</div>
				<?php
				}
				$ctr++;
				?>

			<?php endforeach ?>

			<div class="row d-flex justify-content-between align-items-center text_description">
				<div class="col-md-12">
					<div id="news-slider" class="owl-carousel">
						<?php
						$ctr = 1;
						foreach ($issuedata as $v2):
							$id2 = $v2['id'];
							$query_issue = $pdo->prepare("SELECT * FROM newsletter WHERE issue_month = :id2  LIMIT 1");

							$query_issue->execute(['id2' => $id2]);

							$issue_fetch = $query_issue->fetchAll();
							foreach ($issue_fetch as $issue_row) {
								$attachment = $issue_row['attachment'];
							}
							$attach_query = $pdo->prepare("SELECT * FROM `attachments` WHERE `id` = :att");

							$attach_query->execute(['att' => $attachment]);
							$attach_fetch = $attach_query->fetchAll();
							foreach ($attach_fetch as $attach_row) {
								$file2 = $attach_row['fileName'] . "_" . $attach_row['size'] . $attach_row['id'] . "." . $attach_row['fileExtension'];
								$path2 = "../BARPortal/uploads/newsletter/" . $file2;
							}

						?>
							<div class="post-slide">
								<div class="post-img">
									<img src="<?php echo $path2; ?>">
									<a href="" class="over-layer"><i class="fa fa-link"><?php echo $issue_row['attachment']; ?></i></a>
								</div>
								<div class="post-content">
									<h3 class="post-title">
										<a href="#">
											<?php
											$monthName = date('F', mktime(0, 0, 0, $v2["month"], 10));
											echo 'VOL. ' . $v2['vol_number'] . ' NO. ' . $v2["issue_id"];
											$range = date("d", strtotime($v2['date_from'])) . '-' . date("d F ", strtotime($v2['date_to']));
											echo '<br> ' . $range . '<br>' . date("Y", strtotime($v2['date_to']));
											?>
										</a>
									</h3>
									<span><a href="./index.php?issue_id=<?php echo $v2['id']; ?>" style="text-decoration:none;" class="button_more">View</a></span>
								</div>
							</div>
						<?php
							$ctr++;
						endforeach
						?>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="row">
				<div class="col-md-6 padding_master">
					<br>
					<p>
						<button type="button" class="btn subscribe_btn" data-bs-toggle="modal" data-bs-target="#subscribe" name="subscribe" id="subscribe">
							CLICK HERE TO SUBSCRIBE
						</button>
					</p><br>
					<p style="float: left; margin-right: 10px;" class="mt-1">
						<a href="#" class="social-icons"><i class="fab fa-facebook"></i></a>
						<a href="#" class="social-icons"><i class="fab fa-instagram"></i></a>
						<a href="#" class="social-icons"><i class="fab fa-youtube"></i></a>
						<a href="#" class="social-icons"><i class="fas fa-globe"></i></a><br>
					</p>
					<p class="h6 text-light" style="float: right; margin-left: 10px;">
					<p class="h6 text-light" style="margin: 0; padding: 0;">
						DABAROfficial <br>
						www.bar.gov.ph
					</p>
					</p>
				</div>
				<div class="col-md-6 d-flex padding_master2">
					<p class="h6 text-light footer-desc mt-1">
						RDMIC Bldg. Elliptical Road corner Visayas Avenue,
						Diliman, Quezon City, Philippines 1104
					</p>
					<img src="images/footer_logo.png" alt="" class="img-fluid footer-logo" height="100" width="160">
				</div>
			</div>
		</footer>
	</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>


<script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
<script src="vendor/dist/script.js"></script>

<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("subscribe");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>

</html>