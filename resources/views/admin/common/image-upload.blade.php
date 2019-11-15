<div>
    <div id="myfileupload">
        
        <div>
            {!! Form::label('main_image', 'Main Image', ['class' => 'control-label']) !!}
            {!! Form::file('main_image',['onchange'=>"readURL(this);",'class'=>'form-control','id'=>'uploadfile']) !!}
        </div>
        <!--      Name  mà server request về sẽ là ImageUpload-->

    </div>
    <div id="thumbbox">
        <img height="100" width="100" alt="Thumb image" id="thumbimage" style="display: none" />
        <a class="removeimg" href="javascript:"></a></div>
    <div id="boxchoice">
        <a href="javascript:" class="Choicefile">Chọn file</a>
        <p style="clear:both"></p>
    </div>
    <label class="filename"></label>
</div>