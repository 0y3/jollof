<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Station Manager</title>
<?PHP include('includes/head.php'); ?>
</head>

<body onload="MM_preloadImages('<?PHP echo base_url(); ?>assets/images/dip2.png')">
<table width="950" height="597" border="0" align="center" cellpadding="0" cellspacing="0">
  <?PHP include('includes/body_top.php'); ?>
  <?PHP include('includes/site_menu.php'); ?>
  <tr>
        <td colspan="5" valign="top" background="<?PHP echo base_url(); ?>assets/images/bg.png" class="displayTD">
        	<div id="clear" style="min-height:10px;"></div>
        	<div id="breadCrumbHolder">
            	<ul id="breadcrumb">
                    <li><a href="<?PHP echo site_url('dashboard/index'); ?>" title="My Home"><img src="<?PHP echo base_url(); ?>assets/images/home.gif" alt="Home" class="home" /></a></li>
                    <?PHP if(isset($breadCrumbs)) echo $breadCrumbs; ?>
                </ul>
            </div>
        	<div id="contentHolder">
            <?php if (isset($msg_flash)){ ?>
                <div id='flash-msg' class='flash-msg small'>
                    <?php echo $msg_flash ?>
                </div>
            <?php } ?>
            
            <?php if (isset($msg_error)){ ?>
                <div id='flash-msg' class='flash-msg-error small'>
                        <b><?php echo $msg_error ?></b>
                </div>
			<?php } ?>
            
            <script>
				window.setInterval(function(){
						$j('#flash-msg').slideUp();
					}, 10000);
			</script>
            <table class="dataTable">
            <caption>User's Activity Log</caption>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Action Performed</th>
                      <th>IP Address</th>
                      <th>Browser</th>
                      <th>OS</th>
                      <th>Date Time</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if($userAudit != false)
                      {
                          $x = count($userAudit);
                          for($i=0; $i<$x; $i++)
                          {
                  ?>
                  <tr>
                  	  <td><?= $userAudit[$i]['auditID']; ?></td>
                      <td><?= $userAudit[$i]['actionPerformed']; ?></td>
                      <td><?= $userAudit[$i]['IPAddress']; ?></td>
                      <td><?= $userAudit[$i]['browser'];?></td>
                      <td><?= $userAudit[$i]['platform']; ?></td>
                      <td><?= $userAudit[$i]['dateTime'] ?></td>
                  </tr>
                  <?PHP
                          }
                      }
                  ?>
               </tbody>
              </table>
              <div id="pagenation">
              	<?PHP if(isset($pagenation)) echo $pagenation; ?>
              </div>
            </div>
        </td>
  </tr>
</table>
</body>
</html>