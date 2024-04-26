<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	?>

	<!-- The Modal -->
<div class="modal video-modal" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <svg x="0px" y="0px" viewBox="0 0 122.88 122.88" >
              <path class="st0" d="M1.63,97.99l36.55-36.55L1.63,24.89c-2.17-2.17-2.17-5.73,0-7.9L16.99,1.63c2.17-2.17,5.73-2.17,7.9,0 l36.55,36.55L97.99,1.63c2.17-2.17,5.73-2.17,7.9,0l15.36,15.36c2.17,2.17,2.17,5.73,0,7.9L84.7,61.44l36.55,36.55 c2.17,2.17,2.17,5.73,0,7.9l-15.36,15.36c-2.17,2.17-5.73,2.17-7.9,0L61.44,84.7l-36.55,36.55c-2.17,2.17-5.73,2.17-7.9,0 L1.63,105.89C-0.54,103.72-0.54,100.16,1.63,97.99L1.63,97.99z"/>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	      <div class="video-wrapper">
		      <video src="" autoplay controls muted></video>
	      </div>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal form-modal" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <svg x="0px" y="0px" viewBox="0 0 122.88 122.88" >
            <path class="st0" d="M1.63,97.99l36.55-36.55L1.63,24.89c-2.17-2.17-2.17-5.73,0-7.9L16.99,1.63c2.17-2.17,5.73-2.17,7.9,0 l36.55,36.55L97.99,1.63c2.17-2.17,5.73-2.17,7.9,0l15.36,15.36c2.17,2.17,2.17,5.73,0,7.9L84.7,61.44l36.55,36.55 c2.17,2.17,2.17,5.73,0,7.9l-15.36,15.36c-2.17,2.17-5.73,2.17-7.9,0L61.44,84.7l-36.55,36.55c-2.17,2.17-5.73,2.17-7.9,0 L1.63,105.89C-0.54,103.72-0.54,100.16,1.63,97.99L1.63,97.99z"/>
          </svg>
        </button>
      </div>


      <div class="modal-body">
        <h2 class="block-title larg-margin text-center">Залишити заявку</h2>
        <form action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Ваше ім’я" required >
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" placeholder="Ваше телефон" required >
          </div>
          <button type="submit" class="button red-btn">Надіслати</button>
          <p>Відправляючи свої дані, я ознайомлений(а) з <a href="">Політикою конфіденційності</a></p>
        </form>
      </div>

    </div>
  </div>
</div>
