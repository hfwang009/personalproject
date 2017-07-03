<?php
class CMobilePager extends CBasePager{
	const CSS_PREVIOUS_PAGE='new-a-prve';
	const CSS_NEXT_PAGE='new-a-next';
	
	/**
	 * @var string the CSS class for the previous page button. Defaults to 'previous'.
	 * @since 1.1.11
	 */
	public $previousPageCssClass=self::CSS_PREVIOUS_PAGE;
	/**
	 * @var string the CSS class for the next page button. Defaults to 'next'.
	 * @since 1.1.11
	 */
	public $nextPageCssClass=self::CSS_NEXT_PAGE;
	/**
	 * @var string the text label for the next page button. Defaults to 'Next &gt;'.
	 */
	public $nextPageLabel;
	/**
	 * @var string the text label for the previous page button. Defaults to '&lt; Previous'.
	 */
	public $prevPageLabel;
	/**
	 * @var 是否有数字页码显示.
	*/
	public $page_number = true;
	
	/**
	 * @var array HTML attributes for the pager container tag.
	 */
	public $htmlOptions=array();
	
	
	/**
	 * Initializes the pager by setting some default property values.
	*/
	public function init()
	{
		if($this->nextPageLabel===null)
			$this->nextPageLabel=Yii::t('yii','下一页');
		if($this->prevPageLabel===null)
			$this->prevPageLabel=Yii::t('yii','上一页');
		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->getId();
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='new-tbl-type';
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
	
		list($currentPage,$beginPage,$endPage)=$this->getPageRange();
		$buttons=array();
		// prev page
		if(($page=$currentPage-1)<0)
			$page=0;
			$buttons[]=$this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0);
	
		// internal pages
		if($this->page_number){
			$buttons[]=$this->createPageOptionButton($currentPage,$beginPage,$endPage,$pageCount);
		}
		// next page
		if(($page=$currentPage+1)>=$pageCount-1)
			$page=$pageCount-1;
			$buttons[]=$this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1);
	
		return $buttons;
	}
	
	/**
	 * 创建上一页下一页
	 */
	protected function createPageButton($label,$page,$class,$hidden)
	{
		$button = '<div class="new-tbl-cell">';
		if($hidden){
			$button .= '<span class="'.$class.'"><span>'.$label.'</span></span>';
		}else{
			$button .= '<a class="'.$class.'" href="'.$this->createPageUrl($page).'">';
			$button .= '<span>'.$label.'</span>';
			$button .= '</a>';
		}
		$button .= '</div>';
		return $button;
	}
	
	/**
	 * 创建下拉框分页
	 */
	protected function createPageOptionButton($currentPage,$beginPage,$endPage,$pageCount)
	{
		$button = '<div class="new-tbl-cell new-p-re">';
		$button .= '<div class="new-a-page">';
		$button .= '<span class="new-open">'.($currentPage+1).'/'.$pageCount.'</span>';
		$button .= '</div>';
		$button .= '<select onchange="window.location.href=this.value;" class="new-select">';
		for($i=$beginPage;$i<=$endPage;++$i){
			if($i == $currentPage){
				$button .= '<option selected="selected" value="'.$this->createPageUrl($i).'">第'.($i+1).'页</option>';
			}else{
				$button .= '<option value="'.$this->createPageUrl($i).'">第'.($i+1).'页</option>';
			}
		}
		$button .= '</select>';
		$button .= '</div>';
		return $button;
	}
	
	
	/**
	 * @return array the begin and end pages that need to be displayed.
	 */
	protected function getPageRange()
	{
		$currentPage=$this->getCurrentPage(false);
		$pageCount=$this->getPageCount();
	
		$beginPage=0;
		$endPage=$pageCount;
		return array($currentPage,$beginPage,$endPage);
	}
}