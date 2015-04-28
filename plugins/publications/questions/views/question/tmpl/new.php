<?php
/**
 * HUBzero CMS
 *
 * Copyright 2005-2013 Purdue University. All rights reserved.
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
 * @author    Shawn Rice <zooley@purdue.edu>
 * @copyright Copyright 2005-2013 Purdue University. All rights reserved.
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPLv3
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

$this->css();
?>
<h3 class="section-header">
	<a name="questions"></a>
	<?php echo Lang::txt('PLG_PUBLICATION_QUESTIONS_RECENT_QUESTIONS'); ?>
</h3>
<div class="section">
	<?php foreach ($this->getErrors() as $error) { ?>
	<p class="error"><?php echo $error; ?></p>
	<?php } ?>
	<form action="<?php echo Route::url('index.php?option=' . $this->option . '&id=' . $this->publication->id . '&active=questions'); ?>" method="post" id="hubForm" class="full">
		<fieldset>
			<legend><?php echo Lang::txt('COM_ANSWERS_YOUR_QUESTION'); ?></legend>

			<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
			<input type="hidden" name="id" value="<?php echo $this->escape($this->publication->id); ?>" />
			<input type="hidden" name="active" value="questions" />
			<input type="hidden" name="action" value="save" />
			<input type="hidden" name="funds" value="<?php echo $this->escape($this->funds); ?>" />

			<?php echo JHTML::_('form.token'); ?>

			<input type="hidden" name="tag" value="<?php echo $this->escape($this->tag); ?>" />
			<input type="hidden" name="question[id]" value="<?php echo $this->escape($this->row->get('id')); ?>" />
			<input type="hidden" name="question[email]" value="1" />
			<input type="hidden" name="question[state]" value="0" />
			<input type="hidden" name="question[created_by]" value="<?php echo $this->escape(User::get('id')); ?>" />

			<label for="field-anonymous">
				<input class="option" type="checkbox" name="question[anonymous]" id="field-anonymous" value="1" />
				<?php echo Lang::txt('COM_ANSWERS_POST_QUESTION_ANON'); ?>
			</label>

			<label>
				<?php echo Lang::txt('COM_ANSWERS_TAGS'); ?>:<br />
				<?php
				$tf = Event::trigger('hubzero.onGetMultiEntry', array(array('tags', 'tags', 'actags','', $this->row->get('tags', ''))));
				$tf = implode("\n", $tf);

				echo $tf ? $tf : '<textarea name="tags" id="actags" rows="6" cols="35">' . $this->escape($this->row->get('tags', '')) . '</textarea>';
				?>
			</label>

			<label for="field-subject">
				<?php echo Lang::txt('COM_ANSWERS_ASK_ONE_LINER'); ?>: <span class="required"><?php echo Lang::txt('COM_ANSWERS_REQUIRED'); ?></span><br />
				<input type="text" name="question[subject]" id="field-subject" value="<?php echo $this->escape(stripslashes($this->row->get('subject'))); ?>" />
			</label>

			<label for="field-question">
				<?php echo Lang::txt('COM_ANSWERS_ASK_DETAILS'); ?>:<br />
				<?php
				echo $this->editor('question[question]', $this->escape(stripslashes($this->row->get('question'))),  50, 10, 'field-question', array('class' => 'minimal no-footer'));
				?>
				<span class="hint"><a class="popup" href="<?php echo Route::url('index.php?option=com_wiki&scope=&pagename=Help:WikiFormatting'); ?>">Wiki formatting</a> is allowed.</span>
			</label>

			</label>
		<?php if ($this->banking) { ?>
			<label for="field-reward">
				<?php echo Lang::txt('COM_ANSWERS_ASSIGN_REWARD'); ?>:<br />
				<input type="text" name="question[reward]" id="field-reward" value="" size="5" <?php if ((int) $this->funds <= 0) { echo 'disabled="disabled" '; } ?>/>
				<?php echo Lang::txt('COM_ANSWERS_YOU_HAVE'); ?> <strong><?php echo $this->escape($this->funds); ?></strong> <?php echo Lang::txt('COM_ANSWERS_POINTS_TO_SPEND'); ?>
			</label>
		<?php } else { ?>
			<input type="hidden" name="question[reward]" value="0" />
		<?php } ?>
		</fieldset>

		<p class="submit"><input type="submit" value="<?php echo Lang::txt('COM_ANSWERS_SUBMIT'); ?>" /></p>
	</form>
</div><!-- / .section -->
