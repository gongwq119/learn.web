<?php

$gd = gd_version();


$img = imagecreatefromjpeg($_FILES['upload_file']['tmp_name']);
$white = imagecolorallocate($img, 255, 255, 255);
imagestring($img, 5, 6, 15,  "hello world", $white);
header('Content-Type: image/jpeg');
imagejpeg($img);
imagedestroy($img);











//////////////////////////////////////////////////////////////////////////////
function gd_version()
{
static $version = -1;

if ($version >= 0)
{
return $version;
}

if (!extension_loaded('gd'))
	{
	$version = 0;
}
else
{
// 尝试使用gd_info函数
if (PHP_VERSION >= '4.3')
	{
		if (function_exists('gd_info'))
		{
		$ver_info = gd_info();
			preg_match('/\d/', $ver_info['GD Version'], $match);
			$version = $match[0];
		}
		else
		{
				if (function_exists('imagecreatetruecolor'))
				{
				$version = 2;
			}
			elseif (function_exists('imagecreate'))
			{
			$version = 1;
			}
			}
			}
			else
			{
				if (preg_match('/phpinfo/', ini_get('disable_functions')))
					{
						/* 如果phpinfo被禁用，无法确定gd版本 */
								$version = 1;
				}
				else
				{
					// 使用phpinfo函数
						ob_start();
						phpinfo(8);
						$info = ob_get_contents();
						ob_end_clean();
								$info = stristr($info, 'gd version');
							preg_match('/\d/', $info, $match);
							$version = $match[0];
			}
		}
		}

		return $version;
		}