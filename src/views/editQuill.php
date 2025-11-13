<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ODS</title>

  <!-- Bootstrap 5 (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
  <!--Inclou els stils de Quill-->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
</head>

<body class="bg-light">

  <!-- Capçalera -->

  <main class="container">
    <form action="index.php" method="post">
      <div id="toolbar-container">
        <span class="ql-formats">
          <select class="ql-font" aria-label="Font"></select>
          <select class="ql-size" aria-label="Font size"></select>
        </span>
        <span class="ql-formats">
          <button class="ql-bold" aria-label="Bold"></button>
          <button class="ql-italic" aria-label="Italic"></button>
          <button class="ql-underline" aria-label="Underline"></button>
          <button class="ql-strike" aria-label="Strike"></button>
        </span>
        <span class="ql-formats">
          <select class="ql-color" aria-label="Font color"></select>
          <select class="ql-background" aria-label="Background color"></select>
        </span>
        <span class="ql-formats">
          <button class="ql-script" value="sub" aria-label="Subscript"></button>
          <button class="ql-script" value="super" aria-label="Superscript"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-header" value="1" aria-label="Header 1"></button>
          <button class="ql-header" value="2" aria-label="Header 2"></button>
          <button class="ql-blockquote" aria-label="Blockquote"></button>
          <button class="ql-code-block" aria-label="Code block"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-list" value="ordered" aria-label="Ordered list"></button>
          <button class="ql-list" value="bullet" aria-label="Bullet list"></button>
          <button class="ql-indent" value="-1" aria-label="Decrease indent"></button>
          <button class="ql-indent" value="+1" aria-label="Increase indent"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-direction" value="rtl" aria-label="Right to Left"></button>
          <select class="ql-align" aria-label="Text alignment"></select>
        </span>
  
        <span class="ql-formats">
          <button class="ql-clean" aria-label="Clear formatting"></button>
        </span>
      </div>
      <div id="editor">
        <?= $contingut["contingut"]?>
      </div>
      <input type="hidden" name="contingut" id="hidden-content">
      <input type="hidden" name="id" value="<?=$contingut["id"]?>">
      <input type="hidden" name="r" value="OdsSav" />
      <button type="submit" onclick="document.getElementById('hidden-content').value = quill.getSemanticHTML();">
        Envia el contingut
      </button>
     
    </form>
    <p><a href="https://quilljs.com/" class="link-primary" >Tota la informació de l'editor</a></p>
  </main>

  <!-- Peu -->


</body>
 <!-- Initialize Quill editor -->
      <script>
        const quill = new Quill('#editor', {
          modules: {
            syntax: true,
            toolbar: '#toolbar-container',
          },
          placeholder: "Explica aquí l'ODS",
          theme: 'snow',
        });
      </script>
</html>