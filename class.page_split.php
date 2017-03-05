<?php

class page_split 
{
	var $var_pageSize;
	var $var_currentPage;
	var $var_totalPage;
	var $var_file;

	function page_split($pagesize=10, $file=""){
		$this->var_pageSize=$pagesize;
		$this->var_currentPage=$page;
		$this->var_file=$file;
	}

	function _setPageSize($size=10){
		$this->var_pageSize=$size;
	}

	function _setPage($page=1){
		if(empty($page)) $page=1;
		$this->var_currentPage=$page;
	}

	function _setFile($file=""){
		$this->var_file=$file;
	}

	function _query($sql)
	{
		$result=mysql_query($sql);
		$num=@mysql_num_rows($result);
		$rt = $num%$this->var_pageSize;
				
		$this->var_totalPage = ($rt!=0) ? ceil($num/$this->var_pageSize) : floor($num/$this->var_pageSize); 
		$goto = ($this->var_currentPage - 1) * $this->var_pageSize;

		$sql .= " LIMIT $goto , ".$this->var_pageSize;
		$result=mysql_query($sql);

		return $result;
	}

	function _displayPage($option="",$align="left")
	{

		echo "<section class=pageNumber>";
		if($this->var_currentPage >1 && $this->var_currentPage<=$this->var_totalPage) {
			$prevpage = $this->var_currentPage - 1;
			echo "<nav><a href='".$this->var_file."?page=".$prevpage.($_GET['id'] != '' ? "&id=".$_GET['id'] : "").($_GET['c'] != '' ? "&c=".$_GET['c'] : "")."'>
                        	<img alt='' title='' src='../images/back-none.png' style='display:none;' />
                            <img alt='' title='' src='../images/back.png' />
                        </a>
                    </nav>";
			
		}else{
			echo "<nav><a href='#'>
                        	<img alt='' title='' src='../images/back-none.png' style='display:none;' />
                            <img alt='' title='' src='../images/back.png' />
                        </a>
                    </nav>";
		}
	
		echo "<article>".$this->var_currentPage." of ".$this->var_totalPage."";
		echo "</article>";

		if($this->var_currentPage != $this->var_totalPage) {
			$nextpage = $this->var_currentPage + 1;
			$prevpage = $c-1;
			
                    echo "<nav>
                        <a href='".$this->var_file."?page=".$nextpage.($_GET['id'] != '' ? "&id=".$_GET['id'] : "").($_GET['c'] != '' ? "&c=".$_GET['c'] : "")."'>
                        	<img alt='' title='' src=''../images/next-none.png' style='display:none;' />
                            <img alt='' title='' src='../images/next.png' />
                        </a>
                    </nav>";
		}else{
                    echo "<nav>
                        <a href='#'>
                        	<img alt='' title='' src=''../images/next-none.png' style='display:none;' />
                            <img alt='' title='' src='../images/next.png' />
                        </a>
                    </nav>";
		}

		$b=floor($this->var_currentPage/10); 
		$c=(($b*10));

				
				

		echo "<div class='clear'></div></section>";

		}

}


?>

