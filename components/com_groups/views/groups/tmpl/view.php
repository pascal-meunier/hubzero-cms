<?php
/**
 * HUBzero CMS
 *
 * Copyright 2005-2011 Purdue University. All rights reserved.
 *
 * This file is part of: The HUBzero(R) Platform for Scientific Collaboration
 *
 * The HUBzero(R) Platform for Scientific Collaboration (HUBzero) is free
 * software: you can redistribute it and/or modify it under the terms of
 * the GNU Lesser General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * HUBzero is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * HUBzero is a registered trademark of Purdue University.
 *
 * @package   hubzero-cms
 * @author    Christopher Smoak <csmoak@purdue.edu>
 * @copyright Copyright 2005-2011 Purdue University. All rights reserved.
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPLv3
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

//get objects
$config 	= JFactory::getConfig();
$database 	= JFactory::getDBO();

//get no_html request var
$no_html = JRequest::getInt( 'no_html', 0 );
?>

<?php if (!$no_html) : ?>
	
	<?php echo GroupsHelperView::displayBeforeSectionsContent( $this->group ); ?>
	
	<div class="innerwrap">
		<div id="page_container">
			<div id="page_sidebar">
				<?php
					//logo link - links to group overview page
					$link = JRoute::_('index.php?option='.$this->option.'&cn='.$this->group->get('cn'));
				?>
				<div id="page_identity">
					<a href="<?php echo $link; ?>" title="<?php echo $this->group->get('description'); ?> Home">
						<img src="<?php echo $this->group->getLogo(); ?>" alt="<?php echo $this->group->get('description'); ?> Logo" />
					</a>
				</div><!-- /#page_identity -->
				
				<?php
					// output group options
					echo GroupsHelperView::displayToolbar( $this->group );
				?>
				
				<?php
					// output group menu
					echo GroupsHelperView::displaySections( $this->group );
				?>
				
				<div id="page_info">
					<?php 
						// Determine the join policy
						switch ($this->group->get('join_policy'))
						{
							case 3: $policy = JText::_('Closed');      break;
							case 2: $policy = JText::_('Invite Only'); break;
							case 1: $policy = JText::_('Restricted');  break;
							case 0:
							default: $policy = JText::_('Open'); break;
						}

						// Determine the discoverability
						switch ($this->group->get('discoverability'))
						{
							case 1: $discoverability = JText::_('Hidden'); break;
							case 0:
							default: $discoverability = JText::_('Visible'); break;
						}
						
						// get group logger to get created log entry
						$logger     = GroupsModelLogArchive::getInstance();
						$createdLog = $logger->logs('list', array(
							'gidNumber' => $this->group->get('gidNumber'),
							'orderby'   => 'timestamp ASC'
						), true)->first();
						
						// format created date
						if ($createdLog)
						{
							$created = JHTML::_('date', $createdLog->get('timestamp'), JText::_('DATE_FORMAT_HZ1'));
						}
					?>
					<div class="group-info">
						<ul>
							<li class="info-discoverability">
								<span class="label">Discoverability</span>
								<span class="value"><?php echo $discoverability; ?></span>
							</li>
							<li class="info-join-policy">
								<span class="label">Join Policy</span>
								<span class="value"><?php echo $policy; ?></span>
							</li>
							<?php if($created) : ?>
								<li class="info-created">
									<span class="label">Created</span>
									<span class="value"><?php echo $created; ?></span>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div><!-- /#page_sidebar --> 
			
			<div id="page_main">
				<div id="page_header">
					<h2><a href="<?php echo $link; ?>"><?php echo $this->group->get('description'); ?></a></h2>
					<span class="divider">&#9658;</span>
					<h3>
						<?php echo GroupsHelperView::displayTab( $this->group ); ?>
					</h3>
					
					<?php
						if ($this->tab == 'overview') : 
							$gt = new GroupsTags( $database );
							echo $gt->get_tag_cloud(0,0,$this->group->get('gidNumber'));
						endif;
					?>
				</div><!-- /#page_header -->
				<div id="page_notifications">
					<?php
						foreach ($this->notifications as $notification)
						{
							echo "<p class=\"{$notification['type']}\">{$notification['message']}</p>";
						}
					?>
				</div><!-- /#page_notifications -->
				
				<div id="page_content" class="group_<?php echo $this->tab; ?>">
					<?php endif; ?>
					
					<?php
						// output content
						echo $this->content; 
					?>
					
					<?php if (!$no_html) : ?>
				</div><!-- /#page_content -->
			</div><!-- /#page_main -->
			<br class="clear" />
		</div><!-- /#page_container -->
	</div><!-- /.innerwrap -->
<?php endif; ?>

