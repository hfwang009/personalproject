<?php
/**
 * CAdminPager class file.
*
* @author Qiang Xue <qiang.xue@gmail.com>
* @link http://www.yiiframework.com/
* @copyright Copyright &copy; 2008-2011 Yii Software LLC
* @license http://www.yiiframework.com/license/
*/

/**
 * CLinkPager displays a list of hyperlinks that lead to different pages of target.
*
* @author Qiang Xue <qiang.xue@gmail.com>
* @version $Id$
* @package system.web.widgets.pagers
* @since 1.0
*/
class CAdminPager extends CBasePager
{
	const CSS_SELECTED_PAGE='active';
	const CSS_HIDDEN_PAGE='hidden';
	const URL_SELECTED_PAGE='javascript:;';
	const FONT_FIRST_PAGE='&lt;&lt;';
	const FONT_PREVIOUS_PAGE='&lt;';
	const FONT_NEXT_PAGE='&gt;';
	const FONT_LAST_PAGE='&gt;&gt;';
	
	public $firstPageLabel = self::FONT_FIRST_PAGE;
	
	public $prevPageLabel=self::FONT_PREVIOUS_PAGE;
	
	public $nextPageLabel=self::FONT_NEXT_PAGE;
	
	public $lastPageLabel=self::FONT_LAST_PAGE;
	
	public $hiddenPageCssClass=self::CSS_HIDDEN_PAGE;
	
	public $selectedPageCssClass=self::CSS_SELECTED_PAGE;
	
	public $selectedPageUrl=self::URL_SELECTED_PAGE;
	
	/**
	 * @var integer maximum number of page buttons that can be displayed. Defaults to 10.
	 */
	public $maxButtonCount=10;
	

	public $header;
	
	public $footer='';
	
	public $htmlOptions=array();

	public function init()
	{
		if($this->nextPageLabel===null)
			$this->nextPageLabel='&gt;';
		if($this->prevPageLabel===null)
			$this->prevPageLabel='&lt';
		if($this->header===null)
			$this->header=Yii::t('yii','Go to page: ');

		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->getId();
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='pagination pull-right';
	}

	/**
	 * Executes the widget.
	 * This overrides the parent implementation by displaying the generated page buttons.
	 */
	public function run()
	{
		$buttons=$this->createPageButtons();
		if(empty($buttons))
			return;
		echo $this->header;
		echo CHtml::tag('ul',$this->htmlOptions,implode("\n",$buttons));
		echo $this->footer;
	}

	/**
	 * Creates the page buttons.
	 * @return array a list of page buttons (in HTML code).
	 */
	protected function createPageButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();

		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();

		// first page
		$buttons[]=$this->createPageButton($this->firstPageLabel,0,'',$currentPage<=0,false);
		
		// prev page
		if(($page=$currentPage-1)<0)
			$page=0;
		$buttons[]=$this->createPageButton($this->prevPageLabel,$page,'',$currentPage<=0,false);

		// internal pages
		for($i=$beginPage;$i<=$endPage;++$i)
			$buttons[]=$this->createPageButton($i+1,$i,'',false,$i==$currentPage);

		// next page
		if(($page=$currentPage+1)>=$pageCount-1)
			$page=$pageCount-1;
		$buttons[]=$this->createPageButton($this->nextPageLabel,$page,'',$currentPage>=$pageCount-1,false);

		// last page
		$buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,'',$currentPage>=$pageCount-1,false);
		
		return $buttons;
	}

	/**
	 * Creates a page button.
	 * You may override this method to customize the page buttons.
	 * @param string $label the text label for the button
	 * @param integer $page the page number
	 * @param string $class the CSS class for the page button.
	 * @param boolean $hidden whether this page button is visible
	 * @param boolean $selected whether this page button is selected
	 * @return string the generated button
	 */
	protected function createPageButton($label,$page,$class,$hidden,$selected)
	{
		if($hidden || $selected)
			$class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
		return '<li class="'.$class.'">'.CHtml::link($label,$this->createPageUrl($page)).'</li>';
	}

	/**
	 * @return array the begin and end pages that need to be displayed.
	 */
	protected function getPageRange()
	{
		$currentPage=$this->getCurrentPage();
		$pageCount=$this->getPageCount();

		$beginPage=max(0, $currentPage-(int)($this->maxButtonCount/2));
		if(($endPage=$beginPage+$this->maxButtonCount-1)>=$pageCount)
		{
			$endPage=$pageCount-1;
			$beginPage=max(0,$endPage-$this->maxButtonCount+1);
		}
		return array($beginPage,$endPage);
	}

}
