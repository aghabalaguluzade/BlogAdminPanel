@extends('admin.layouts.master')
@section('title', 'Əlavə etmək')
@section('links')
	<script src="https://cdn.tiny.cloud/1/scvngxld7kolvh817hw9omsrym0g2d96ke02f1jb08mz6ih1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('header')
    Tənzimləmələr - <span class="fw-normal">Əlavə et</span>
@endsection
@section('content')
				<!-- Content area -->
				<div class="content">

					<!-- Form inputs -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Tənzimləmələr əlavə et</h5>
						</div>
						<div class="card-body">
                            @include('admin.errors.errors')
                            <form action="{{ route('settings.updateOrCreate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Seo başlığı</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Placeholder" name="seo_title" value="{{ $settings?->seo_title }}" />
                                                <label>Seo başlığ daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Seo açıqlama</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Placeholder" style="height: 100px;" name="seo_description">{{ $settings?->seo_description }}</textarea>
                                                <label>Seo açıqlama</label>
                                            </div>
                                        </div>
								    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Seo keyword</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Placeholder" style="height: 100px;" name="seo_keywords">{{ $settings?->seo_keywords }}</textarea>
                                                <label>Seo keyword</label>
                                            </div>
                                        </div>
								    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Çari Loqo</label>
                                        <div class="col-lg-10">
                                            <img src="{{ config('apidomain.url') .'settings/'. $settings?->logo }}" alt="{{ $settings?->seo_title }}" /> 
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Loqo</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="logo" />
                                                <span class="input-group-text">.jpg</span>
                                                <span class="input-group-text">.jpeg</span>
                                                <span class="input-group-text">.png</span>
                                                <span class="input-group-text">.webp</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Çari Favicon</label>
                                        <div class="col-lg-10">
                                            <img src="{{ config('apidomain.url') .'settings/'. $settings?->favicon }}" alt="{{ $settings?->seo_title }}" /> 
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Favicon</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="favicon" />
                                                <span class="input-group-text">.jpg</span>
                                                <span class="input-group-text">.jpeg</span>
                                                <span class="input-group-text">.png</span>
                                                <span class="input-group-text">.webp</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">E-Poçt</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Placeholder" name="contact_email" value="{{ $settings?->contact_email }}" />
                                                <label>E-poçt daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Ünvan</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Placeholder" name="contact_map" value="{{ $settings?->contact_map }}" />
                                                <label>Ünvan daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Telefon</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="tel" class="form-control" placeholder="Placeholder" name="contact_phone" value="{{ $settings?->contact_phone }}" />
                                                <label>Telefon daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Haqqında</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="editor" style="height: 100px;" name="about_us">{!! $settings?->about_us !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">İnstagram</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="url" class="form-control" placeholder="Placeholder" name="social_instagram" value="{{ $settings?->social_instagram }}" />
                                                <label>İnstagram daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Facebook</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="url" class="form-control" placeholder="Placeholder" name="social_facebook" value="{{ $settings?->social_facebook }}" />
                                                <label>Facebook daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Linkedin</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="url" class="form-control" placeholder="Placeholder" name="social_linkedin" value="{{ $settings?->social_linkedin }}" />
                                                <label>Linkedin daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Twitter</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="url" class="form-control" placeholder="Placeholder" name="social_twitter" value="{{ $settings?->social_twitter }}" />
                                                <label>Twitter daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Youtube</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="url" class="form-control" placeholder="Placeholder" name="social_youtube" value="{{ $settings?->social_youtube }}" />
                                                <label>Youtube daxil edin....</label>
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
@endsection