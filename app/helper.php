<?php

/**
 * [message return the api responses]
 * @param  boolean $status  [status true success false for failure]
 * @param  array   $data    [object will be sent]
 * @param  string  $message [message will be sent]
 * @param  integer  $code [for response code]
 * @return Response
 */
function message($status = true, $data = [], $message = '', $code = 200)
{
    return response()->json([
        'status' => $status,
        'data' => $data ?? [],
        'message' => $message,
        'code' => $code,
    ], $code);
}

 /**
  * [td makes dd with trace information]
  * @return [type] [description]
  */
  function td()
  {
      $trace = debug_backtrace();
      echo '<pre style="background:#F2F2F2;border:solid 1px;padding:1em; font-size:12pt">';
      echo '<h2><u>Trace</u></h3>';
      echo '<b>file</b> : <span style="color:red">'.$trace[0]['file']."</span>";
      echo '<br><b>line</b> : <span style="color:blue">'.$trace[0]['line']."</span>";
      if (isset($trace[1]['function'])) {
          echo '<br><b>function</b> : <span style="color:blue">'.$trace[1]['function']."</span>";
      }
      if (isset($trace[1]['class'])) {
          echo '<br><b>class</b> : <span style="color:red">'.$trace[1]['class']."</span>";
      }
      echo '</pre>';
      echo '<h2><u>Dump</u></h3>';
      $args = func_get_args();
      if (!empty($args)) {

          call_user_func('dd', ((count($args) > 1)? $args : $args[0]) );
      }else{
          dd();
      }
  }
