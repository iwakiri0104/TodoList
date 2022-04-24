# Todoアプリ
オブジェクト指向で作成

# 機能一覧
* 閲覧機能
* 新規投稿機能
* 編集機能
* 削除機能
* ページング機能
* 検索機能

#  作成クラス一覧
## DBクラス

### メソッド一覧

*  データベースに接続
*  データを全て取得する
*  IDを元にデータを取得する
*  データ数を取得 getを受け取れば検索ワードを含んだデータ数、受け取らなければ通常のデータ数

## PAGEクラス

DBクラスを継承

### メソッド一覧

*  合計ページ数を取得
*  現在のページ番号を取得
*  データの取得開始位置取得
*  1ページに表示するデータを取得 getを受け取れば検索ワードを含んだデータ、受け取らなければ通常のデータ

## TODOクラス

### メソッド一覧

* todo投稿
* todo編集
* todo削除

## VALIDATEクラス
* 制作途中
