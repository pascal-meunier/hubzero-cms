<?php
/**
 * @package    hubzero-cms
 * @copyright  Copyright (c) 2005-2024 The Regents of the University of California.
 * @license    http://opensource.org/licenses/MIT MIT
 */

// No direct access
defined('_HZEXEC_') or die();

$css = "#account-header {
border-collapse: collapse;
border: 1px solid #c2e1e3;
background: #e6fafb;
font-size: 0.9em;
line-height: 1.6em;
background-image: -webkit-gradient(linear, 0 0, 100% 100%,
	color-stop(.25, rgba(255, 255, 255, .075)), color-stop(.25, transparent),
	color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .075)),
	color-stop(.75, rgba(255, 255, 255, .075)), color-stop(.75, transparent),
	to(transparent));
background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, .075) 25%, transparent 25%,
	transparent 50%, rgba(255, 255, 255, .075) 50%, rgba(255, 255, 255, .075) 75%,
	transparent 75%, transparent);
background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, .075) 25%, transparent 25%,
	transparent 50%, rgba(255, 255, 255, .075) 50%, rgba(255, 255, 255, .075) 75%,
	transparent 75%, transparent);
background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, .075) 25%, transparent 25%,
	transparent 50%, rgba(255, 255, 255, .075) 50%, rgba(255, 255, 255, .075) 75%,
	transparent 75%, transparent);
background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, .075) 25%, transparent 25%,
	transparent 50%, rgba(255, 255, 255, .075) 50%, rgba(255, 255, 255, .075) 75%,
	transparent 75%, transparent);
background-image: linear-gradient(-45deg, rgba(255, 255, 255, .075) 25%, transparent 25%,
	transparent 50%, rgba(255, 255, 255, .075) 50%, rgba(255, 255, 255, .075) 75%,
	transparent 75%, transparent);
-webkit-background-size: 30px 30px;
-moz-background-size: 30px 30px;
background-size: 30px 30px;}";

$this->css($css);

$base = str_replace('/administrator', '', Request::base());
$base = rtrim($base, '/');
?>

<!-- Start Header -->
<table class="tbl-header" cellpadding="2" cellspacing="3" border="0" width="100%" style="border-collapse: collapse; border-bottom: 2px solid #e1e1e1;">
	<tbody>
		<tr>
			<td width="10%" nowrap="nowrap" align="left" valign="bottom" style="font-size: 1.4em; color: #999; padding: 0 10px 5px 0; text-align: left;">
				<?php echo $this->sitename; ?>
			</td>
			<td class="mobilehide" width="80%" align="left" valign="bottom" style="line-height: 1; padding: 0 0 5px 10px;">
				<span style="font-weight: bold; font-size: 0.85em; color: #666; -webkit-text-size-adjust: none;">
					<a href="<?php echo $base; ?>" style="color: #666; font-weight: bold; text-decoration: none; border: none;"><?php echo $this->sitename; ?></a>
				</span>
				<br />
				<span style="font-size: 0.85em; color: #666; -webkit-text-size-adjust: none;"><?php echo Config::get('MetaDesc'); ?></span>
			</td>
			<td width="10%" nowrap="nowrap" align="right" valign="bottom" style="border-left: 1px solid #e1e1e1; font-size: 1.2em; color: #999; padding: 0 0 5px 10px; text-align: right; vertical-align: bottom;">
				<?php echo Lang::txt('PLG_USER_HUBZERO_EMAIL_ACCOUNTS'); ?>
			</td>
		</tr>
	</tbody>
</table>
<!-- End Header -->

<!-- Start Header Spacer -->
<table  width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr style="border-collapse: collapse;">
		<td height="30" style="border-collapse: collapse;"></td>
	</tr>
</table>
<!-- End Header Spacer -->

<!-- ====== Start Header ====== -->
<table id="account-header" width="100%"  cellpadding="0" cellspacing="0" border="0">
	<tbody>
		<tr>
			<td style="font-weight: bold; border-bottom: 1px solid #c2e1e3; padding: 16px 30px; text-align: center; font-size: 1.5em; color: #e96c6c;" align="left">
				<?php echo Lang::txt('PLG_USER_HUBZERO_EMAIL_ACCOUNT_CREATION_NOTIFICATION'); ?>
			</td>
		</tr>
	</tbody>
</table>
<!-- ====== End Header ====== -->

<!-- ====== Start Header Spacer ====== -->
<table  width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr style="border-collapse: collapse;">
		<td height="30" style="border-collapse: collapse;"></td>
	</tr>
</table>
<!-- ====== End Header Spacer ====== -->

<table id="account-info" width="100%"  cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; line-height: 1.6em;">
	<tbody>
		<tr>
			<td width="100%" style="padding: 18px 8px 8px 8px; border-top: 2px solid #e9e9e9;">
				<p>
					<?php echo Lang::txt('PLG_USER_HUBZERO_EMAIL_ADMIN_ACCOUNT_REQUESTED', $this->user['name'] . ' (' . $this->user['email'] . ')', $this->user['username'], $this->sitename); ?>
				</p>

				<p>
					<?php echo Lang::txt('PLG_USER_HUBZERO_EMAIL_ADMIN_REVIEW_LINK'); ?>
					<?php echo $base . Route::url('index.php?option=com_members&id=' . $this->user['id']); ?>
				</p>
			</td>
		</tr>
	</tbody>
</table>

<!-- Start Footer Spacer -->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tbody>
		<tr style="border-collapse: collapse;">
			<td height="30" style="border-collapse: collapse; color: #fff !important;"><div style="height: 30px !important; visibility: hidden;">----</div></td>
		</tr>
	</tbody>
</table>
<!-- End Footer Spacer -->
