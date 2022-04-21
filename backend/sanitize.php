<?php


function sanitize($data)
{
  stripslashes($data);
  trim($data);
  htmlspecialchars(strip_tags($data));
  return $data;
}