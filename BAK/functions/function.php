<?php

try {
  //$pdo = new PDO('mysql:host=127.0.0.1;dbname=pds_db', 'root', '');
  $pdo = new PDO('mysql:host=10.0.0.231;dbname=pds_db', 'admin', 'datos@bar2021');
  // See the "errors" folder for details...
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}

session_start();

// function getArticle($pdo, $datePublish){
function getArticle($pdo)
{ 
  $temp = array();
  $sql = "SELECT 
  newsletter.title as title,
  newsletter.description as description,
  newsletter.id as newsletterid,
  newsletter.author as newsletterauthor,
  newsletter.lead as newsletterlead,
  newsletter.dateUploaded as news_dateUploaded,
  newsletter.date_letter as news_date_letter,
  attachments.fileName as fileName, 
  attachments.id as attachmentid, 
  attachments.size as fileSize,
  attachments.id as fileID,
  newsletter_issue.issue_header as header_image,
  newsletter_issue.date_from as from_date,
  newsletter_issue.date_to as to_date,
  newsletter_issue.vol_number as vol_num,
  newsletter_issue.id as issuance_id,
  attachments.fileExtension as fileExtension FROM newsletter_issue 
  INNER JOIN newsletter ON newsletter_issue.id = newsletter.issue_month
  INNER JOIN attachments ON attachments.id = newsletter.attachment
  WHERE newsletter_issue.post_status = 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $temp[] = $row;
  }
  // $data = preg_replace("/\{[^}]+\}/", "", $myData);
  
  return $temp;
}

function getArticlebyIssue($pdo, $isyu_id)
{ 
  $temp = array();
  $sql = "SELECT 
  newsletter.title as title,
  newsletter.description as description,
  newsletter.id as newsletterid,
  newsletter.author as newsletterauthor,
  newsletter.lead as newsletterlead,
  newsletter.dateUploaded as news_dateUploaded,
  newsletter.date_letter as news_date_letter,
  attachments.fileName as fileName, 
  attachments.id as attachmentid, 
  attachments.size as fileSize,
  attachments.id as fileID,
  newsletter_issue.issue_header as header_image,
  newsletter_issue.date_from as from_date,
  newsletter_issue.date_to as to_date,
  newsletter_issue.vol_number as vol_num,
  newsletter_issue.id as issuance_id,
  attachments.fileExtension as fileExtension FROM newsletter_issue 
  INNER JOIN newsletter ON newsletter_issue.id = newsletter.issue_month
  INNER JOIN attachments ON attachments.id = newsletter.attachment 
  WHERE newsletter.issue_month = :isyo_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(":isyo_id" => $isyu_id));
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $temp[] = $row;
  }
  // $data = preg_replace("/\{[^}]+\}/", "", $myData);
  
  return $temp;
}


function viewletter($pdo, $newsletter_id)
{ 
  $temp = array();
  $sql = "SELECT newsletter.title as title,
  newsletter.description as description,
  newsletter.id as newsletterid,
  newsletter.author as newsletterauthor,
  newsletter.dateUploaded as news_dateUploaded,
  newsletter.date_letter as news_date_letter,
  newsletter.lead as news_lead,
  attachments.fileName as fileName, 
  attachments.id as attachmentid, 
  attachments.size as fileSize,
  attachments.id as fileID,
  attachments.fileExtension as fileExtension
  FROM newsletter 
  INNER JOIN attachments ON attachments.id=newsletter.attachment 
  WHERE newsletter.id = :newsLetter";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(":newsLetter" => $newsletter_id));
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $temp[] = $row;
  }
  return $temp;
}

  function getArticle2($pdo, $newsletter_id)
{ 
  $temp = array();
  $sql = "SELECT newsletter.title as title,
  newsletter.description as description,
  newsletter.id as newsletterid,
  newsletter.dateUploaded as news_dateUploaded,
  attachments.fileName as fileName, 
  attachments.id as attachmentid, 
  attachments.size as fileSize,
  attachments.id as fileID,
  attachments.fileExtension as fileExtension FROM newsletter INNER JOIN attachments ON attachments.id=newsletter.attachment WHERE newsletter.id != :newsLetter";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(":newsLetter" => $newsletter_id));
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $temp[] = $row;
  }
  return $temp;
}

/// START VIEWING OF ISSUE SLIDER QUERY
function viewIssue($pdo, $isyu_id)
{ 
  if($isyu_id <> ''){
    $temp = array();
    $sql = "SELECT * FROM `newsletter_issue` WHERE `id` != :isyow_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":isyow_id" => $isyu_id));
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $temp[] = $row;
    }
  }else{
    $temp = array();
    $sql = "SELECT * FROM `newsletter_issue` WHERE `post_status`  = 0 and `id` != :isyow_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":isyow_id" => $isyu_id));
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $temp[] = $row;
    }
  }
  
  return $temp;
}
/// END VIEWING OF ISSUE SLIDER QUERY