<?php 
include("functions/function.php"); 
    if(isset($_GET['newsLetterID'])){
        $newsletter_id = $_GET['newsLetterID'];
    }else{
        header("location: index.php");
    }       
?>
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

<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="vendor/dist/style.css">
</head>
<style>
	.text_description{
		background-color: #fff;
	}
	.text_left{
		background-color: #fff;
		text-align: left;
	}
	.text_right{
		background-color: #fff;
		text-align: right;
		
	}
	.text_news{
		color: #198754;
	}
	.button_more {
		background-color: #0c5935;
		border: none;
		color: #fff;
		padding: 8px 16px;
		text-align: center;
		float: right;
		margin: -10px 0px -10px 0px;
		cursor: pointer;
		border-radius: 25px;
	}
	
	.button_more:hover {
		background-color: #198754;
		color: #fff;
	}
	
	.center {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 100%;
	}
	.auth {
	text-transform: uppercase;
	
	}
	
	.link::first-line {
	text-transform: uppercase;
	}
</style>
<body>
<?php 
	$data = viewletter($pdo, $newsletter_id);
	$data2 = getArticle2($pdo, $newsletter_id);
?>
<div class="container">

    <div class="container container_letter">
	<img src="images/e-news.png"  align="middle" alt=""  class="center">
			<?php  
			$ctr =1; 
			foreach($data as $v): 
            $file = $v['fileName']."_".$v['fileSize'].$v['fileID'].".".$v['fileExtension'];
            $path = "../BARPortal/uploads/newsletter/".$file;
			$description = $v['description'];
			$newsletterid = $v['newsletterid'];
			$author = $v['newsletterauthor'];
			$author = $v['newsletterauthor'];
			//$newsletterauthor_ = $v['newsletterauthor_'];
			$auth_sql = "SELECT 
			newsletter_authors.author_id as auth_id,
			newsletter_authors.newsletter_id as news_id,
			view_employeeinfo.userID as use_id,
			view_employeeinfo.firstName as fname,
			view_employeeinfo.lastName as lname
			FROM newsletter_authors INNER JOIN view_employeeinfo ON newsletter_authors.author_id = view_employeeinfo.userID WHERE newsletter_authors.newsletter_id = '$newsletterid'";
			$stmt = $pdo->prepare($auth_sql);
			$stmt->execute();
			$fetch = $stmt->fetchAll();
			
			$news_date_letter =  date("d F Y",strtotime($v['news_date_letter']));
			if($ctr == 1){
			?>
			<div class="row d-flex justify-content-between align-items-center text_description" style=" margin: 20px 0px 0px 0px;"> 
				<div class="col-sm-12  col-lg-12 " style="clear:both;">
					<img style="" width="100%" height="100%" src="<?php echo $path;?>">
					<p><h1 class="fs-2 text_news"><?= $v['title']; ?></h1></p>
					<p>
						<i><?php echo $news_date_letter; ?></i> | 
						<i class="auth" >
							<?php 
								echo $author;
							// $x = 1;
							// $length = count($fetch);
							// 	foreach($fetch as $rows){
							// 		if($length === 1){
							// 			echo $rows['fname'].' '.$rows['lname'];
							// 		}else{
							// 			if($x === 1){
											//first item
								// 			echo $rows['fname'].' '.$rows['lname'].', ';
								// 		}else if($x === $length){
								// 			echo $rows['fname'].' '.$rows['lname'];
								// 		}else{
								// 			echo $rows['fname'].' '.$rows['lname'].', ';
								// 		}
								// 	}
								// 	$x++;
								// }
							?>
						</i>
					</p>
					
					<p  style="float: right;  clear:both;">
					<?php 
						$description_uploads = str_replace("ckeditor/uploads/","../BARPortal/news_letter/ckeditor/uploads/",$description);
						$description_uploads2 = str_replace('class="image" style="float:left"','class="image" style="float:left; margin: 20px 20px 20px 20px;"',$description_uploads);
						echo str_replace("margin-left:0.5cm; margin-right:0cm","margin-left:0cm; margin-right:0.5cm",$description_uploads2);
					?>
					</p>
				</div>
			</div> 
            <?php 
            } 
            ?>
        <?php endforeach ?>
		<div class="row d-flex justify-content-between align-items-center text_description">
			<div class="col-md-12">
				<div id="news-slider" class="owl-carousel">
					<?php  
					$ctr =1; 
					foreach($data2 as $v2): 
					$file2 = $v2['fileName']."_".$v2['fileSize'].$v2['fileID'].".".$v2['fileExtension'];
					$path2 = "../BARPortal/uploads/newsletter/".$file2;
					$title2 = substr($v2['title'],0,30).'...';
					$description2 = substr($v2['description'],0,70).'...';
					$newsletterid2 = $v2['newsletterid'];
					$news_dateUploaded2 =  date("M d, Y",strtotime($v2['news_dateUploaded']));
					?>
					<div class="post-slide">
						<div class="post-img">
							<img src="<?php echo $path2;?>" alt="">
							<a href="" class="over-layer"><i class="fa fa-link"></i></a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
							<a href="#"><?php echo $title2;?></a>
							</h3>
							<p class="post-description"><?php echo $description2;?></p>
							<span><a href="./view_letter.php?newsLetterID=<?php echo $newsletterid2;?>" style="text-decoration:none;" class="button_more">Read More</a></span>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
    } );
</script>

<script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
<script  src="vendor/dist/script.js"></script>
</html>