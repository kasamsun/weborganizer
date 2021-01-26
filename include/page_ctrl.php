<?
class PageControl
{
var $sql;
var $page;
var $orderby;
var $sorttype;
var $row_per_page;
var $page_param;
var $prev_page;
var $next_page;
var $num_rows;
var $num_pages;
var $page_start;

function page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page)
{
	// all these variable will be updated
	global $db;

	$this->sql = $sql;
	$this->page_param = $page_param;
	$this->orderby = $orderby;
	$this->page = $page;
	$this->sorttype = $sorttype;
	$this->row_per_page = $row_per_page;

	$result = $db->query($sql);
	if ( !DB::IsError($result) ) $this->num_rows = $result->numRows(); else $this->num_rows = 0;
		
	if ( $sorttype > 0 )
		$this->sql .= " order by ".$this->orderby." ASC";
	else
		$this->sql .= " order by ".$this->orderby." DESC";

	$this->prev_page = $this->page-1;
	$this->next_page = $this->page+1;
	$this->page_start = ($this->row_per_page * $this->page) - $this->row_per_page;
	if ( $this->num_rows	 <= $this->row_per_page )
		$this->num_pages = 1;
	else if (( $this->num_rows % $this->row_per_page) == 0 )
		$this->num_pages = ($this->num_rows/$this->row_per_page);
	else
		$this->num_pages = ($this->num_rows/$this->row_per_page)+1;
	$this->num_pages = (int) $this->num_pages;
	if ( !DB::IsError($result) ) $result->free();
}

function &query()
{
	global $db;
	return $db->limitQuery($this->sql,$this->page_start,$this->row_per_page);
}

function page_column($col_field,$col_desc)
{
	if ($this->orderby==$col_field) 
	{ 
		echo "<a href=\"$PHP_SELF?".$this->page_param."&orderby=$col_field&sorttype=".-$this->sorttype."&page=".$this->page."\">$col_desc";
		if ($this->sorttype>0) 
			echo "<img src=\"/images/nav_sort_asc.gif\" border=0 align=\"absmiddle\">";
		else 
			echo "<img src=\"/images/nav_sort_desc.gif\" border=0 align=\"absmiddle\">";
		echo "</a>";
	}
	else
	{
		echo "<a href=\"$PHP_SELF?".$this->page_param."&orderby=$col_field&sorttype=".$this->sorttype."&page=".$this->page."\">$col_desc</a>";
	}
}
function page_navigator()
{
	if ( $this->num_pages > 1 && $this->page != 1 ) 
	{
		echo "<a title=\"First Page\" href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=1\"><img src=\"/images/nav_first.gif\" border=0 align=\"absmiddle\"></a> ";
	}
	if ( $this->page-$page%10-1 >= 1 && $this->page-$this->page%10-1 <=$this->num_pages ) 
	{
		echo "<a title=\"10 Previous Page\" href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=".($this->page-$this->page%10-1)."\"><img src=\"/images/nav_prev10.gif\" border=0 align=\"absmiddle\"></a> ";
	}
	if ( $this->prev_page ) 
	{
		echo "<a title=\"Previous Page\" href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=".$this->prev_page."\"><img src=\"/images/nav_prev.gif\" border=0 align=\"absmiddle\"></a> ";
	}
	for ($i=1;$i<=$this->num_pages;$i++)
	{
		if (  (int)($i/10)+1 != (int)($this->page/10)+1 ) continue;
		if ($i != $this->page ) 
		{
			echo "<a href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=$i\">";
			echo "[$i] </a> ";
		} 
		else 
		{
			echo "<b>$i</b> ";
		}
	}
	if ( $this->page != $this->num_pages ) 
	{
		echo "<a title=\"Next Page\" href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=".$this->next_page."\">";
		echo "<img src=\"/images/nav_next.gif\" border=0 align=\"absmiddle\"></a> ";
	}
	if ( $this->page-$this->page%10+10 >= 1 && $this->page-$this->page%10+10 <=$this->num_pages ) 
	{
		echo "<a title=\"Next 10 Page\" href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=".($this->page-$this->page%10+10)."\">";
		echo "<img src=\"/images/nav_next10.gif\" border=0 align=\"absmiddle\"></a> ";
	}
	if ( $this->num_pages >= 1 && $this->page < $this->num_pages ) 
	{
		echo "<a title=\"Last Page\" href=\"$PHP_SELF?".$this->page_param."&orderby=".$this->orderby."&sorttype=".$this->sorttype."&page=".$this->num_pages."\">";
		echo "<img src=\"/images/nav_last.gif\" border=0 align=\"absmiddle\"></a> ";
	}
}
}
?>