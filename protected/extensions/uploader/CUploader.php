<?php
class CUploader extends CWidget {
	public $server = '';
	public $auto = true;
	
	// 指定运行时启动顺序。默认会想尝试 html5 是否支持，如果支持则使用 html5, 否则则使用 flash.
	// {Object} [可选] [默认值：html5,flash]
	public $runtimeOrder = 'html5';
	
	//是否允许在文件传输时提前把下一个文件准备好。{Boolean} [可选] [默认值：false]
	public $prepareNextFile = true;
	
	//是否要分片处理大文件上传。
	//{Boolean} [可选] [默认值：false]
	public $chunked = true;
	
	//分片大小 默认大小为5M.
	// {Boolean} [可选] [默认值：5242880]
	public $chunkSize = 5242880;
	
	//如果某个分片由于网络问题出错，允许自动重传多少次？
	// {Boolean} [可选] [默认值：2]
	public $chunkRetry = 2;
	
	//上传并发数。允许同时最大上传进程数。
	//{Boolean} [可选] [默认值：3]
	public $threads = 3;
	
	//文件上传请求的参数表，每次发送都会发送此对象中的参数。
	// {Object} [可选] [默认值：{}]
	public $formData = '';
	
	//设置文件上传域的name。
	// {Object} [可选] [默认值：'file']
	public $fileVal = 'file';
	
	//文件上传方式，POST或者GET。
	// {Object} [可选] [默认值：'POST']
	public $method = 'POST';
	
	//是否已二进制的流的方式发送文件，这样整个上传内容php://input都为文件内容， 其他参数在$_GET数组中。
	// {Object} [可选] [默认值：false]
	public $sendAsBinary = false;
	
	//验证文件总数量, 超出则不允许加入队列。
	// {int} [可选] [默认值：undefined]
	public $fileNumLimit = '';
	
	//验证文件总大小是否超出限制, 超出则不允许加入队列。
	// {int} [可选] [默认值：undefined]
	public $fileSizeLimit = '';
	
	//验证单个文件大小是否超出限制, 超出则不允许加入队列。
	// {int} [可选] [默认值：undefined]
	public $fileSingleSizeLimit = '';
	
	//去重， 根据文件名字、文件大小和最后修改时间来生成hash Key.
	// {Boolean} [可选] [默认值：undefined]
	public $duplicate = '';
	
	//默认所有 Uploader.register 了的 widget 都会被加载，如果禁用某一部分，请通过此 option 指定黑名单。
	// {String, Array} [可选] [默认值：undefined]
	public $disableWidgets = '';
	
	public function init(){
		$this->fileNumLimit = 50;
		$this->fileSizeLimit = 50 * 5 * 1024 * 1024;
		$this->fileSingleSizeLimit = 5 * 1024 * 1024;
	}
	
	public function run()
	{
		$assets = dirname(__FILE__).'/';
		
		$baseUrl = Yii::app()->assetManager->publish($assets);
		
		$cs = Yii::app()->getClientScript();
		
		$this->registerCssFile($cs,$baseUrl);
		$this->registerClientScript($cs,$baseUrl);
		
		$view = $this->createUploadView();
		$cs->registerScript(__CLASS__, "
				\$uploadModel = $('<div id=\"uploadModel\" style=\"background: none repeat scroll 0 0 rgba(0, 0, 0, 0.6); overflow-y: scroll; position: absolute; width: 100%; z-index: 4001; display:none;\">$view</div>').appendTo('body');
				$('#uploadImages').click(function(){
					var sTop = document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
	    			var sHeight = $(document).height();
					var wHeight = $(window).height();
					var pHeight = $('.page-container').height();
					var pTop = 0; 
					if(wHeight > pHeight){
						pTop = (wHeight-pHeight)/2;
					}
					$('.page-container').css({marginTop:pTop});
					$('body').css({overflow:'hidden'});
					$('#uploadModel').css({top:sTop,height:sHeight}).show();
					// WebUploader实例
			        uploader;
					if ( !WebUploader.Uploader.support() ) {
				        alert( 'Web Uploader 不支持您的浏览器！如果你使用的是IE浏览器，请尝试升级 flash 播放器');
				        throw new Error( 'WebUploader does not support the browser you are using.' );
				    }
					// 实例化
				    uploader = WebUploader.create({
				        dnd: '#uploader .queueList',
				        disableGlobalDnd: true,
				        paste: document.body,
				        pick: {
				            id: '#filePicker',
				            label: '点击选择图片'
				        },
				        accept: {
				            title: 'Images',
				            extensions: 'gif,jpg,jpeg,bmp,png',
				            mimeTypes: 'image/*'
				        },
				    	auto: true,
				        // swf文件路径
				        swf: '{$baseUrl}/assets/member/js/Uploader.swf',
				        chunked: true,
				        // server: 'http://webuploader.duapp.com/server/fileupload.php',
				        server: '{$this->server}',
				        fileNumLimit: {$this->fileNumLimit},
				        fileSizeLimit: {$this->fileSizeLimit},    // 200 M
				        fileSingleSizeLimit: {$this->fileSingleSizeLimit}    // 50 M
				    });
				    // 添加“添加文件”的按钮，
				    uploader.addButton({
				        id: '#filePicker2',
				        label: '继续添加'
				    });
					uploader.onUploadProgress = function( file, percentage ) {
				        var \$li = $('#'+file.id),
				        \$percent = \$li.find('.progress span');
				
				        \$percent.css( 'width', percentage * 100 + '%' );
				        percentages[ file.id ][ 1 ] = percentage;
				        updateTotalProgress();
				    };
				
				    uploader.onFileQueued = function( file ) {
				        fileCount++;
				        fileSize += file.size;
				
				        if ( fileCount === 1 ) {
				            \$placeHolder.addClass( 'element-invisible' );
				            \$statusBar.show();
				        }
				        uploader.md5File( file ).progress(function(percentage) {
				            console.log('Percentage:', percentage);
				        }).then(function(val) {
				            console.log('md5 result:', val);
				        });
				        addFile( file );
				        setState( 'ready' );
				        updateTotalProgress();
				    };
				
				    uploader.onFileDequeued = function( file ) {
				        fileCount--;
				        fileSize -= file.size;
				
				        if ( !fileCount ) {
				            setState( 'pedding' );
				        }
				
				        removeFile( file );
				        updateTotalProgress();
				
				    };
				    
				    uploader.onUploadSuccess = function( file ,response ) {
				    	if(!response.error){
				    		$('#'+file.id).find('p.imgWrap>img').attr('img_src',response.result);
				    	}
				    };
				
				    // 文件上传失败，显示上传出错。
				    uploader.on( 'uploadError', function( file ) {
				        var \$li = $( '#'+file.id ),
				            \$error = \$li.find('div.error');
				
				        // 避免重复创建
				        if ( !\$error.length ) {
				            \$error = $('<div class=\"error\"></div>').appendTo( \$li );
				        }
				
				        \$error.text('上传失败');
				    });
				    
				    uploader.on( 'all', function( type ) {
				        var stats;
				        switch( type ) {
				            case 'uploadFinished':
				                setState( 'confirm' );
				                break;
				            case 'startUpload':
				                setState( 'uploading' );
				                break;
				            case 'stopUpload':
				                setState( 'paused' );
				                break;
				        }
				    });
				
				    uploader.onError = function( code ) {
				        alert( '错误: ' + code );
				        uploader.stop();
				    };
				
				    \$upload.on('click', function() {
				        if ( $(this).hasClass( 'disabled' ) ) {
				            return false;
				        }
				        if ( state === 'ready' ) {
				            uploader.upload();
				        } else if ( state === 'paused' ) {
				            uploader.upload();
				        } else if ( state === 'uploading' ) {
				            uploader.stop();
				        } else if ( state === 'finish' ){
				        	finishSubmit();
				        }
				    });
				
				    \$info.on( 'click', '.retry', function() {
				        uploader.retry();
				    });
				
				   	\$info.on( 'click', '.ignore', function() {
				        alert( 'todo' );
				    });
				
				    \$upload.addClass( 'state-' + state );
				    updateTotalProgress();
				});
				$('#flashClose').on('click',function(){
					\$queue.empty();
					\$placeHolder.removeClass( 'element-invisible' );
			    	\$uploadModel.hide();
			    	$('body').css('overflow','visible');
				});
				
				\$wrap = $('#uploader'),
        		// 图片容器
        		\$queue = $('<ul class=\"filelist element-invisible\"></ul>').appendTo( \$wrap.find('.queueList') ),
		        // 状态栏，包括进度和控制按钮
		        \$statusBar = \$wrap.find('.statusBar'),
		        // 文件总体选择信息。
		        \$info = \$statusBar.find('.info'),
		        // 上传按钮
		        \$upload = \$wrap.find('.uploadBtn'),
		        // 没选择文件之前的内容。
		        \$placeHolder = \$wrap.find('.placeholder'),
		        // 总体进度条
		        \$progress = \$statusBar.find('.progress').hide(),
		        // 添加的文件数量
		        fileCount = 0,
		        // 添加的文件总大小
		        fileSize = 0,
		        // 优化retina, 在retina下这个值是2
		        ratio = window.devicePixelRatio || 1,
		        // 缩略图大小
		        thumbnailWidth = 1,
		        thumbnailHeight = 1,
		        // 可能有pedding, ready, uploading, confirm, done.
		        state = 'pedding',
		        // 所有文件的进度信息，key为file id
		        percentages = {},
		        supportTransition = (function(){
		            var s = document.createElement('p').style,
		                r = 'transition' in s ||
		                      'WebkitTransition' in s ||
		                      'MozTransition' in s ||
		                      'msTransition' in s ||
		                      'OTransition' in s;
		            s = null;
		            return r;
		        })();
		");
	}
	
	private function createUploadView(){
		$html = '<div class="page-container">';
		$html .= '<div class="wu-example" id="uploader">';
		$html .= '<div class="flash-upload-header">';
		$html .= '<a class="flash-upload-close" href="javascript:void(0);" id="flashClose"></a>';
		$html .= '<span id="flashTitle">上传图片</span>';
		$html .= '</div>';
		$html .= '<div class="queueList">';
		$html .= '<div class="placeholder" id="dndArea">';
		$html .= '<div id="filePicker" class="webuploader-container">';
		$html .= '<div class="webuploader-pick">点击选择图片</div>';
		$html .= '</div>';
		$html .= '<p>或将照片拖到这里，单次最多可选50张</p>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div style="display: none;" class="statusBar">';
		$html .= '<div class="progress" style="display: none;">';
		$html .= '<span class="text">0%</span>';
		$html .= '<span class="percentage" style="width: 0%;"></span>';
		$html .= '</div>';
		$html .= '<div class="info">共0张（0B），已上传0张</div>';
		$html .= '<div class="imageType">';
		$html .= '<span>图片分类：</span>';
		$html .= '<span>';
		$html .= '<select id="imageTypeSelect">';
		$html .= '<option value="funny">搞怪图片</option>';
		$html .= '<option value="hd">高清摄影</option>';
		$html .= '<option value="tour">校园采风</option>';
		$html .= '</select>';
		$html .= '</span>';
		$html .= '</div>';
		$html .= '<div class="btns">';
		$html .= '<div id="filePicker2" class="webuploader-container"></div>';
		$html .= '<div class="uploadBtn state-pedding">完成上传</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		return $html;
	}
	
	private function registerClientScript($cs,$baseUrl){
		$cs->registerScriptFile($baseUrl . '/webuploader.js', CClientScript::POS_HEAD);
		
		$cs->registerScriptFile($baseUrl . '/upload.js', CClientScript::POS_END);
	}
	
	private function registerCssFile($cs,$baseUrl){
		$cs->registerCssFile($baseUrl . '/webuploader.css');
		
		$cs->registerCssFile($baseUrl . '/upload.css');
	}
}