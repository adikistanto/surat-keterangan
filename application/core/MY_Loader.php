<?php

/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader {

    public function append($text, $return = false) {
        $this->output->append_output($text);
        if ($return)
            return $text;
    }

    /*
      public function template($template_name, $vars = array(), $show=false,$return = FALSE)
      {

      } */
    // template website admin
    public function template($template_name, $vars = array(), $return = FALSE) {
        $content = $this->view('header', $vars, $return);
        $content = $this->view($template_name, $vars, $return);

        if ($return) {
            return $content;
        }
    }
}
