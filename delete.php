<?php

// ディレクトリへのパス
$path = './up/';

// 変数の初期化
$result = false;

if( is_writable($path) ) {
	$result = unlink( $path.'data.txt');
	
	if( $result ) {
		echo 'ファイルを削除しました。';
	} else {
		echo 'ファイルの削除に失敗しました。';
	}
}

return;