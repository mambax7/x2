<?php
/**
 * Private message
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code 
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         pm
 * @since           2.3.0
 * @author          Jan Pedersen
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id$
 */
include 'header.php';
xoops_cp_header();
include_once XOOPS_ROOT_PATH."/modules/pm/class/message.php";
include_once XOOPS_ROOT_PATH."/class/pagenav.php";
$pm_handler =& xoops_getmodulehandler('message');
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : "read";

$myaddlimit = '30';

switch($op) {
	case 'to':
	   echo "<div class='bold red'>All pm's to ".XoopsUser::getUnameFromId($_REQUEST['user'],"S")."</div>";
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('to_userid',$_REQUEST['user']));
		$criteria->setSort("msg_id");
		$criteria->setOrder("DESC");
$numrows = $pm_handler->getCount();
		$pm_arr = $pm_handler->getall($criteria);
		if ($numrows>0) 
		{	
             /**
				 * start pagenav setting 
				 * get information for limit by $_REQUEST['limit']
				 * get information for start by $_REQUEST['start']
				 */ 
				 
				 // get limited information
		       if (isset($_REQUEST['limit'])) {
			        $criteria->setLimit($_REQUEST['limit']);
			        $limit = $_REQUEST['limit'];
			    } else {
			        $criteria->setLimit($myaddlimit);
			        $limit = $myaddlimit;
			    }
			    
			    // get start information
		       if (isset($_REQUEST['start'])) {
		        $criteria->setStart($_REQUEST['start']);
		        $start = $_REQUEST['start'];
			    } else {
		        $criteria->setStart(0);
		        $start = 0;
			    }
		       
		       // make pagenav tolbar
			    $pm_arr = $pm_handler->getall($criteria);
			    if ( $numrows > $limit ) {
			        $pagenav = new XoopsPageNav($numrows, $limit, $start, 'start', 'limit=' . $limit);
			        $pagenav = $pagenav->renderNav(4);
			    } else {
			        $pagenav = '';
			    }
			    
			    echo $pagenav;	
			    
			    		echo "<table width=\"100%\" cellspacing=\"1\" class=\"outer\">
				<tr>
					<th align=\"center\">from</th>
					<th align=\"center\">to</th>
					<th align=\"center\">date</th>
					<th align=\"center\">text</th>
				</tr>";
				
			$class = "odd";
			
			foreach (array_keys($pm_arr) as $i) 
			{	
					echo "<tr class=\"".$class."\">";
					$class = ($class == "even") ? "odd" : "even";
					echo "<td align=\"center\">
					<a href='".XOOPS_URL."/user.php?id=".$pm_arr[$i]->getVar("from_userid")."'>".XoopsUser::getUnameFromId($pm_arr[$i]->getVar("from_userid"),"S")."</a>
					<a href='".XOOPS_URL."/modules/pm/admin/read.php?op=from&user=".$pm_arr[$i]->getVar("from_userid")."'>(all)</a>
					</td>";	
				   echo "<td align=\"center\">
				   <a href='".XOOPS_URL."/user.php?id=".$pm_arr[$i]->getVar("to_userid")."'>".XoopsUser::getUnameFromId($pm_arr[$i]->getVar("to_userid"),"S")."</a>
				   <a href='".XOOPS_URL."/modules/pm/admin/read.php?op=to&user=".$pm_arr[$i]->getVar("to_userid")."'>(all)</a>
				   </td>";	
				   echo "<td align=\"center\">".formatTimeStamp($pm_arr[$i]->getVar("msg_time"),"S")."</td>";	
				   echo "<td align=\"center\">".$pm_arr[$i]->getVar("msg_text")."</td>";	
					echo "</tr>";
			}
		echo "</table><br><br>";	
      }
	break;
	
	case 'from':
	   echo "<div class='bold red'>All pm's from ".XoopsUser::getUnameFromId($_REQUEST['user'],"S")."</div>";
		$criteria = new CriteriaCompo();
      $criteria->add(new Criteria('from_userid',$_REQUEST['user']));
		$criteria->setSort("msg_id");
		$criteria->setOrder("DESC");
      $numrows = $pm_handler->getCount();
		$pm_arr = $pm_handler->getall($criteria);
		if ($numrows>0) 
		{	
             /**
				 * start pagenav setting 
				 * get information for limit by $_REQUEST['limit']
				 * get information for start by $_REQUEST['start']
				 */ 
				 
				 // get limited information
		       if (isset($_REQUEST['limit'])) {
			        $criteria->setLimit($_REQUEST['limit']);
			        $limit = $_REQUEST['limit'];
			    } else {
			        $criteria->setLimit($myaddlimit);
			        $limit = $myaddlimit;
			    }
			    
			    // get start information
		       if (isset($_REQUEST['start'])) {
		        $criteria->setStart($_REQUEST['start']);
		        $start = $_REQUEST['start'];
			    } else {
		        $criteria->setStart(0);
		        $start = 0;
			    }
		       
		       // make pagenav tolbar
			    $pm_arr = $pm_handler->getall($criteria);
			    if ( $numrows > $limit ) {
			        $pagenav = new XoopsPageNav($numrows, $limit, $start, 'start', 'limit=' . $limit);
			        $pagenav = $pagenav->renderNav(4);
			    } else {
			        $pagenav = '';
			    }
			    
			    echo $pagenav;	
			    
			    		echo "<table width=\"100%\" cellspacing=\"1\" class=\"outer\">
				<tr>
					<th align=\"center\">from</th>
					<th align=\"center\">to</th>
					<th align=\"center\">date</th>
					<th align=\"center\">text</th>
				</tr>";
				
			$class = "odd";
			
			foreach (array_keys($pm_arr) as $i) 
			{	
					echo "<tr class=\"".$class."\">";
					$class = ($class == "even") ? "odd" : "even";
					echo "<td align=\"center\">
					<a href='".XOOPS_URL."/user.php?id=".$pm_arr[$i]->getVar("from_userid")."'>".XoopsUser::getUnameFromId($pm_arr[$i]->getVar("from_userid"),"S")."</a>
					<a href='".XOOPS_URL."/modules/pm/admin/read.php?op=from&user=".$pm_arr[$i]->getVar("from_userid")."'>(all)</a>
					</td>";	
				   echo "<td align=\"center\">
				   <a href='".XOOPS_URL."/user.php?id=".$pm_arr[$i]->getVar("to_userid")."'>".XoopsUser::getUnameFromId($pm_arr[$i]->getVar("to_userid"),"S")."</a>
				   <a href='".XOOPS_URL."/modules/pm/admin/read.php?op=to&user=".$pm_arr[$i]->getVar("to_userid")."'>(all)</a>
				   </td>";	
				   echo "<td align=\"center\">".formatTimeStamp($pm_arr[$i]->getVar("msg_time"),"S")."</td>";	
				   echo "<td align=\"center\">".$pm_arr[$i]->getVar("msg_text")."</td>";	
					echo "</tr>";
			}
		echo "</table><br><br>";	
      }
	break;	
	
	case 'read':
		$criteria = new CriteriaCompo();
		$criteria->setSort("msg_id");
		$criteria->setOrder("DESC");
		$numrows = $pm_handler->getCount();
		$pm_arr = $pm_handler->getall($criteria);
		if ($numrows>0) 
		{	
             /**
				 * start pagenav setting 
				 * get information for limit by $_REQUEST['limit']
				 * get information for start by $_REQUEST['start']
				 */ 
				 
				 // get limited information
		       if (isset($_REQUEST['limit'])) {
			        $criteria->setLimit($_REQUEST['limit']);
			        $limit = $_REQUEST['limit'];
			    } else {
			        $criteria->setLimit($myaddlimit);
			        $limit = $myaddlimit;
			    }
			    
			    // get start information
		       if (isset($_REQUEST['start'])) {
		        $criteria->setStart($_REQUEST['start']);
		        $start = $_REQUEST['start'];
			    } else {
		        $criteria->setStart(0);
		        $start = 0;
			    }
		       
		       // make pagenav tolbar
			    $pm_arr = $pm_handler->getall($criteria);
			    if ( $numrows > $limit ) {
			        $pagenav = new XoopsPageNav($numrows, $limit, $start, 'start', 'limit=' . $limit);
			        $pagenav = $pagenav->renderNav(4);
			    } else {
			        $pagenav = '';
			    }
			    
			    echo $pagenav;	
			    
			    		echo "<table width=\"100%\" cellspacing=\"1\" class=\"outer\">
				<tr>
					<th align=\"center\">from</th>
					<th align=\"center\">to</th>
					<th align=\"center\">date</th>
					<th align=\"center\">text</th>
				</tr>";
				
			$class = "odd";
			
			foreach (array_keys($pm_arr) as $i) 
			{	
					echo "<tr class=\"".$class."\">";
					$class = ($class == "even") ? "odd" : "even";
					echo "<td align=\"center\">
					<a href='".XOOPS_URL."/user.php?id=".$pm_arr[$i]->getVar("from_userid")."'>".XoopsUser::getUnameFromId($pm_arr[$i]->getVar("from_userid"),"S")."</a>
					<a href='".XOOPS_URL."/modules/pm/admin/read.php?op=from&user=".$pm_arr[$i]->getVar("from_userid")."'>(all)</a>
					</td>";	
				   echo "<td align=\"center\">
				   <a href='".XOOPS_URL."/user.php?id=".$pm_arr[$i]->getVar("to_userid")."'>".XoopsUser::getUnameFromId($pm_arr[$i]->getVar("to_userid"),"S")."</a>
				   <a href='".XOOPS_URL."/modules/pm/admin/read.php?op=to&user=".$pm_arr[$i]->getVar("to_userid")."'>(all)</a>
				   </td>";	
				   echo "<td align=\"center\">".formatTimeStamp($pm_arr[$i]->getVar("msg_time"),"S")."</td>";	
				   echo "<td align=\"center\">".$pm_arr[$i]->getVar("msg_text")."</td>";	
					echo "</tr>";
			}
		echo "</table><br><br>";	
      }
	break;
}

xoops_cp_footer();
?>