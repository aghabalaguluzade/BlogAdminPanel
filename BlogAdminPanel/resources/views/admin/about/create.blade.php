@extends('admin.layouts.master')
@section('title', 'Əlavə etmək')
@section('links')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/scvngxld7kolvh817hw9omsrym0g2d96ke02f1jb08mz6ih1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('header')
    Haqqında - <span class="fw-normal">Əlavə et</span>
@endsection
@section('content')
				<!-- Content area -->
				<div class="content"> 

					<!-- Form inputs -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Haqqında əlavə et</h5>
						</div>
						<div class="card-body">
                            @include('admin.errors.errors')
                            <form action="{{ route('about.updateOrCreate') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if($about->img)
                                    <div class="row mb-3">
                                    <span class="col-form-label col-lg-2">Çari foto</span>
                                    <div class="col-lg-10">
                                        <div class="form-floating">
                                            <img src="{{ config('apidomain.url') . 'about/' . $about?->img }}" alt="{{ $about?->title }}" style="width:150px;height:150px" />
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">

                                <div class="mb-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Haqqında Şəkili</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="img" id="readUrl" />
                                                <span class="input-group-text">.jpg</span>
                                                <span class="input-group-text">.jpeg</span>
                                                <span class="input-group-text">.png</span>
                                                <span class="input-group-text">.webp</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Haqqında</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="editor" style="height: 100px;" name="description">{!! $about?->description !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-end">
										<button type="submit" class="btn btn-primary">Əlavə et <i class="ph-paper-plane-tilt ms-2"></i></button>
									</div>
                                </div>
                            </form>
						</div>
					</div>
					<!-- /form inputs -->

				</div>
				<!-- content area -->
@endsection
@section('scripts')
<script>
  var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
  tinymce.init({
      selector: '#editor',
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
      imagetools_cors_hosts: ['picsum.photos'],
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
      toolbar_sticky: true,
      autosave_ask_before_unload: true,
      autosave_interval: '30s',
      autosave_prefix: '{path}{query}-{id}-',
      autosave_restore_when_empty: false,
      autosave_retention: '2m',
      image_advtab: true,
      link_list: [
          { title: 'My page 1', value: 'https://www.tiny.cloud' },
          { title: 'My page 2', value: 'http://www.moxiecode.com' }
      ],
      image_list: [
          { title: 'My page 1', value: 'https://www.tiny.cloud' },
          { title: 'My page 2', value: 'http://www.moxiecode.com' }
      ],
      image_class_list: [
          { title: 'None', value: '' },
          { title: 'Some class', value: 'class-name' }
      ],
      importcss_append: true,
      file_picker_callback: function (callback, value, meta) {
          /* Provide file and text for the link dialog */
          if (meta.filetype === 'file') {
              callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
          }
          /* Provide image and alt text for the image dialog */
          if (meta.filetype === 'image') {
              callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
          }
          /* Provide alternative source and posted for the media dialog */
          if (meta.filetype === 'media') {
              callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
          }
      },
      templates: [
          { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%" border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
          { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
          { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
      ],
      template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
      template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
      height: 600,
      image_caption: true,
      quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
      noneditable_noneditable_class: 'mceNonEditable',
      toolbar_mode: 'sliding',
      contextmenu: 'link image imagetools table',
      skin: useDarkMode ? 'oxide-dark' : 'oxide',
      content_css: useDarkMode ? 'dark' : 'default',
      content_style: 'body { font-family:Arial,Helvetica,sans-serif; font-size:14px }'
  });
</script>
<script>
    document.getElementById('readUrl').addEventListener('change', function(){
        if (this.files[0] ) {
            var picture = new FileReader();
            picture.readAsDataURL(this.files[0]);
            picture.addEventListener('load', function(event) {
            document.getElementById('uploadedImage').setAttribute('src', event.target.result);
            document.getElementById('uploadedImage').style.display = 'block';
            document.getElementById('uploadedImage').style.height = '150px';
            document.getElementById('uploadedImage').style.width = '150px';
            });
        }
    });
</script>
@endsection