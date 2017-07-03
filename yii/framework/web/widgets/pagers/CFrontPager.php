<?php
class CFrontPager extends CBasePager{
	const CSS_SELECTED_PAGE='page_now';
	const CSS_HIDDEN_PAGE='hidden';
	const FONT_PREVIOUS_PAGE='上一页';
	const FONT_NEXT_PAGE='下一页';
	
	
	public $prevPageLabel=self::FONT_PREVIOUS_PAGE;
	
	public $nextPageLabel=self::FONT_NEXT_PAGE;
	
	public $hiddenPageCssClass=self::CSS_HIDDEN_PAGE;
	
	public $selectedPageCssClass=self::CSS_SELECTED_PAGE;
	
	public $totalPageLabel;
	
	/**
	 * @var integer maximum number of page buttons that can be displayed. Defaults to 10.
	 */
	public $maxButtonCount=10;
	
	public $htmlOptions=array();
	
	public function init()
	{
		if($this->totalPageLabel===null)
			$this->totalPageLabel=Yii::t('yii','<span class="f_l f6" style="margin-right:10px;">总计<b>'.$this->getItemCount().'</b>个记录</span>');
		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']='pager';
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='pagebar';
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
		echo CHtml::tag('div',$this->htmlOptions,implode("\n",$buttons));
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
		// sum page
		$buttons[]=$this->totalPageLabel;
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
		if($hidden)
			return;
		if($selected){
			$class.=' '. $this->selectedPageCssClass;
			return '<span class="'.$class.'">'.$label.'</span>';
		}else{
			return CHtml::link($label,$this->createPageUrl($page),array('class'=>$class));
		}
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