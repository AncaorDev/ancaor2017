<!-- Bootstrap -->
<script src="<?=DIR_LIBS?>bootstrap/js/bootstrap.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?=DIR_RS?>panel/js/custom.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>

<script src="<?=DIR_LIBS?>summernote/lang/summernote-es-ES.js"></script>
<script src="<?=DIR_LIBS?>summernote/plugin/img/summernote-image-attributes.js"></script>
<script src="<?=HOME?>core/js/summernoteconf.js"></script>

<script type="text/javascript" src="<?=DIR_LIBS?>validator/validator.js"></script>

<script src="<?=HOME?>core/js/registrodata.js"></script>
<script src="<?=HOME?>core/js/modificardata.js"></script>
    <script src="<?=HOME?>core/js/session.js"></script>

<!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = false;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();
        return false;
      });
    </script>
    <!-- /validator -->


