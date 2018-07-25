<?php
/**
*
* @package quick_title_edition_mod
* @version $Id: functions_attributes.php,v 1.1.0 20/06/2007 19:59 PastisD Exp $
* @copyright (c) 2007 PastisD - http://www.oxygen-powered.net/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

// current version
define('QTE_VERSION', '1.5.6');

class attribute_class {

  var $attributes = array();
  var $attr_names = array();

  function attribute_class()
  {
    global $db;

  	$sql = 'SELECT attribute_id, attribute, attribute_color, attribute_date_format, attribute_position, attribute_author, attribute_administrator, attribute_moderator 
      FROM ' . ATTRIBUTES_TABLE . ' ORDER BY attribute_order ASC';
  	if (!$result = $db->sql_query($sql))
  	{
  		message_die(GENERAL_MESSAGE, 'Could not query attributes table');
  	}
  	while ($row = $db->sql_fetchrow($result))
  	{
      $this->attributes[$row['attribute_id']] = array(
        'attribute_id' => $row['attribute_id'],
        'attribute' => $row['attribute'], 
        'attribute_color' => $row['attribute_color'], 
        'attribute_date_format' => $row['attribute_date_format'], 
        'attribute_position' => $row['attribute_position'],
        'attribute_author' => $row['attribute_author'], 
        'attribute_administrator' => $row['attribute_administrator'],
        'attribute_moderator' => $row['attribute_moderator'],
			);
  	}
  	$db->sql_freeresult();

  	$sql = 'SELECT user_id, username FROM ' . USERS_TABLE . ' WHERE user_id <> -1';
  	if (!$result = $db->sql_query($sql))
  	{
  		message_die(GENERAL_MESSAGE, 'Could not query attributes table');
  	}
  	while ($row = $db->sql_fetchrow($result))
  	{
      $this->attr_names[$row['user_id']] = array('username' => $row['username']);
  	}
  	$db->sql_freeresult();
  }

	/**
	*	Attributes display function
	*/
  function attribute(&$topic_title, $topic_attribute)
  {
  	global $board_config, $lang, $db;

  	if (!empty($topic_attribute))
  	{
  		list($attr_id, $user_id, $attr_date) = explode(',', $topic_attribute);

  		$attribute = lang_item($this->attributes[$attr_id]['attribute']);
  		$attribute = str_replace('%mod%', phpbb_clean_username($this->attr_names[$user_id]['username']), $attribute);
  		$attribute = str_replace('%date%', create_date($this->attributes[$attr_id]['attribute_date_format'], $attr_date, $board_config['board_timezone']), $attribute);

  		$topic_title = $this->attributes[$attr_id]['attribute_position'] ? $topic_title . ' <span style="color:#' . $this->attributes[$attr_id]['attribute_color'] . '">' . $attribute . '</span>' : '<span style="color:#' . $this->attributes[$attr_id]['attribute_color'] . '">' . $attribute . '</span> ' . $topic_title;
  	}
  }

  /**
  *	Attributes selector
  */
  function attribute_selector($topic_attribute = '')
  {
  	global $board_config, $lang, $db, $userdata;

  	$combo = '<select name="attribute_id"><option value="-1" style="font-weight: bold;">' . $lang['No_Attribute'] . '</option>';
    list($attr_id, $user_id, $attr_date) = explode(',', $topic_attribute); 
  	foreach ($this->attributes as $attr)
  	{
  		if (($attr['attribute_author'] && $userdata['user_level'] == USER) || ($attr['attribute_moderator'] && $userdata['user_level'] == MOD) || ($attr['attribute_administrator'] && $userdata['user_level'] == ADMIN))
  		{
  		  $selected = ( $attr['attribute_id'] == $attr_id ) ? 'selected="selected"' : '';
  			$attribute = lang_item($attr['attribute']);
  			$attribute = str_replace('%mod%', phpbb_clean_username($userdata['username']), $attribute);
  			$attribute = str_replace('%date%', create_date($attr['attribute_date_format'], time(), $board_config['board_timezone']), $attribute);

  			$combo .= '<option value="' . $attr['attribute_id'] . '" style="font-weight: bold; color:#' . $attr['attribute_color'] . '" ' . $selected . '>' . $attribute . '</option>';
  		}
  	}
  	$combo .= '</select>';

  	return $combo;
  }
}

$attribute_class = new attribute_class();

/**
* Used to check if a image key exists
* Inspired of lang_item() function, from class_common.php file by reddog
*/
function image_item($key)
{
	global $template;

	return !empty($key) && isset($images[$key]) ? $images[$key] : $key;
}

?>
