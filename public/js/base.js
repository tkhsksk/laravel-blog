tinymce.init({
    selector: 'textarea',
    newline_behavior: 'invert',
    language: 'ja',
    statusbar: false,
    menubar: false,
    link_default_target: '_blank',
    newline_behavior: 'invert',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
    toolbar: 'blocks bold align underline forecolor | emoticons link image table hr | numlist bullist | code codeblock',
    block_formats: 'Paragraph=p; Header 1=h3; Header 2=h4; Header 3=h5',
    height:300,
});


document.addEventListener('focusin', (e) => {
  if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
    e.stopImmediatePropagation();
  }
});