<?php
Class Helper{
  public static function dd($var)
  {
      echo"<pre>";
      die(var_dump($var));
      echo "</pre>";
  }

  public static function old($user_input)
  {
      if (isset($_POST["$user_input"])) {
          return $_POST["$user_input"];
      }
  }
}
