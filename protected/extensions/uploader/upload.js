// 当有文件添加进来时执行，负责view的创建
function addFile( file ) {
    var $li = $( '<li id="' + file.id + '"><p class="title">' + file.name + '</p><p class="imgWrap"></p><p class="progress"><span></span></p></li>'),
        $load = $('<div class="load-icon"></div>').appendTo( $li ),
        $comment = $('<div class="upload-descript-box"><span class="descript-arrow"></span><textarea class="upload-descript-content" maxlength="240" placeholder="添加描述"></textarea></div>').appendTo( $li ),
        $btns = $('<div class="file-panel"><span class="cancel" title="删除">删除</span><span class="rotateRight" title="向右旋转">向右旋转</span><span class="rotateLeft" title="向左旋转">向左旋转</span><span class="setCover" title="设为封面">设为封面</span></div>').appendTo( $li ),
        $prgress = $li.find('p.progress span'),
        $wrap = $li.find( 'p.imgWrap' ),
        $cover = $li.find('div.file-panel span').eq(3),
        $info = $('<p class="error"></p>'),

        showError = function( code ) {
            switch( code ) {
                case 'exceed_size':
                    text = '文件大小超出';
                    break;

                case 'interrupt':
                    text = '上传暂停';
                    break;
                default:
                    text = '上传失败，请重试';
                    break;
            }

            $info.text( text ).appendTo( $li );
        };

    if ( file.getStatus() === 'invalid' ) {
        showError( file.statusText );
    } else {
        // @todo lazyload
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $wrap.text('不能预览');
                return;
            }
            var img = $('<img src="'+src+'">');
            $wrap.append(img);
            $load.hide();
        }, thumbnailWidth, thumbnailHeight );
        percentages[ file.id ] = [ file.size, 0 ];
        file.rotation = 0;
    }

    file.on('statuschange', function( cur, prev ) {
        if ( prev === 'progress' ) {
            $prgress.hide().width(0);
        }

        // 成功
        if ( cur === 'error' || cur === 'invalid' ) {
            console.log( file.statusText );
            showError( file.statusText );
            percentages[ file.id ][ 1 ] = 1;
        } else if ( cur === 'interrupt' ) {
            showError( 'interrupt' );
        } else if ( cur === 'queued' ) {
            percentages[ file.id ][ 1 ] = 0;
        } else if ( cur === 'progress' ) {
            $info.remove();
            $prgress.css('display', 'block');
        } else if ( cur === 'complete' ) {
            $li.append( '<span class="success"></span>' );
        }

        $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
    });

    $li.on( 'mouseenter', function() {
        $btns.stop().animate({height: 30});
    });

    $li.on( 'mouseleave', function() {
        $btns.stop().animate({height: 0});
    });

    $btns.on( 'click', 'span', function() {
        var index = $(this).index(),deg;

        switch ( index ) {
            case 0:
                uploader.removeFile( file );
                break;

            case 1:
                file.rotation += 90;
                break;

            case 2:
                file.rotation -= 90;
                break;
        }

        if ( supportTransition ) {
            deg = 'rotate(' + file.rotation + 'deg)';
            $wrap.css({
                '-webkit-transform': deg,
                '-mos-transform': deg,
                '-o-transform': deg,
                'transform': deg
            });
        } else {
            $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
        }


    });
    $cover.on( 'click', function(){
    	if($(this).hasClass("setCover")){
    		$("li[id^='WU_FILE_']").removeAttr('iscover');
    		$li.attr('isCover',1);
    		$("span[class='cancelCover']").removeClass('cancelCover').addClass('setCover');
    		$(this).removeClass('setCover').addClass('cancelCover').attr('title','取消封面').text('取消封面');
    	}else{
    		$li.removeAttr('iscover');
    		$(this).removeClass('cancelCover').addClass('setCover').attr('title','设为封面').text('设为封面');
    	}
    });
    $comment.on( 'change', 'textarea', function(){
    	var comment = $(this).val();
    	if(comment.length > 240){
    		alert("图片描述必须小于240字");
    	}
    });
    $li.appendTo( $queue );
    $queue.removeClass("element-invisible");
}
// 数据提交
function finishSubmit(){
	var $li = $('li[id^="WU_FILE_"][class="state-complete"]');
	if($li.length > 0){
		var thumb='',img='',is_default='',desc='',data = '{';
		$li.each(function(i){
			is_default = $(this).attr('iscover')?1:0;
			img = $(this).find('p.imgWrap img').attr('img_src');
			desc = $(this).find('textarea[class="upload-descript-content"]').val();
			data += (i==0)?'':',';
			data += i +':{"img":"'+ img +'","is_default":"'+ is_default +'","desc":"'+ desc +'"}';
		});
		data += '}';
		var image_type = $("#imageTypeSelect").val();
		var postUrl = baseUrl + '/member/usersImages/uploadImageFinish';
        $.post(postUrl,{data:data,image_type:image_type},function(result){
           alert(result.msg);
           location.reload() ;
        },"json");
	}
}
// 负责view的销毁
function removeFile( file ) {
    var $li = $('#'+file.id);
    var img = $li.find( 'p.imgWrap>img' );
    var postUrl = baseUrl + '/member/usersImages/removeImage';
    var src = img.attr('img_src');
    $.post(postUrl,{src:src},function(msg){
       if(msg == 1){
    	   delete percentages[ file.id ];
    	   updateTotalProgress();
    	   $li.off().find('.file-panel').off().end().remove();
       }else{
    	   alert('图片删除错误！');
       }
    });
}

function updateTotalProgress() {
    var loaded = 0,
        total = 0,
        spans = $progress.children(),
        percent;

    $.each( percentages, function( k, v ) {
        total += v[ 0 ];
        loaded += v[ 0 ] * v[ 1 ];
    } );

    percent = total ? loaded / total : 0;

    spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
    spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
    updateStatus();
}

function updateStatus() {
    var text = '', stats;

    if ( state === 'ready' ) {
        text = '选中' + fileCount + '张图片，共' +
                WebUploader.formatSize( fileSize ) + '。';
    } else if ( state === 'confirm' ) {
        stats = uploader.getStats();
        if ( stats.uploadFailNum ) {
            text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+
                stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
        }

    } else {
        stats = uploader.getStats();
        text = '共' + fileCount + '张（' +
                WebUploader.formatSize( fileSize )  +
                '），已上传' + stats.successNum + '张';

        if ( stats.uploadFailNum ) {
            text += '，失败' + stats.uploadFailNum + '张';
        }
    }

    $info.html( text );
}

function setState( val ) {
    var file, stats;

    if ( val === state ) {
        return;
    }

    $upload.removeClass( 'state-' + state );
    $upload.addClass( 'state-' + val );
    state = val;

    switch ( state ) {
        case 'pedding':
            $placeHolder.removeClass( 'element-invisible' );
            $queue.parent().removeClass('filled');
            $queue.hide();
            $statusBar.addClass( 'element-invisible' );
            uploader.refresh();
            break;

        case 'ready':
            $placeHolder.addClass( 'element-invisible' );
            $queue.parent().addClass('filled');
            $queue.show();
            $statusBar.removeClass('element-invisible');
            uploader.refresh();
            break;

        case 'uploading':
            $progress.show();
            $upload.text( '暂停上传' );
            break;

        case 'paused':
            $progress.show();
            $upload.text( '继续上传' );
            break;

        case 'confirm':
            $progress.hide();
            $upload.text( '完成上传' );

            stats = uploader.getStats();
            if ( stats.successNum && !stats.uploadFailNum ) {
                setState( 'finish' );
                return;
            }
            break;
        case 'finish':
            stats = uploader.getStats();
            if ( !stats.successNum ) {
                // 没有成功的图片，重设
                state = 'done';
                location.reload();
            }
            break;
    }

    updateStatus();
}