 
# クイズアプリです。

# AWS
- http://ec2-13-112-58-28.ap-northeast-1.compute.amazonaws.com/ (laravel 10 php 8.2 )
- http://ec2-13-112-58-28.ap-northeast-1.compute.amazonaws.com/phpMyAdmin で管理できるようにしています。
 
## docker(local)
* laravel 10 http://localhost トップページ
* php 8.3
* phpmyadmin http://localhost:8080
* mysql

## 機能
- クイズに回答すると次へボタン表示してdisabled
- クイズ正誤判定
- クイズ削除
- 最後のクイズに回答後に結果ボタン表示
- 結果ページで結果をメールで送信できる(非同期) mailgun

 
## テーブル
- answers
- quizzes
- users

## コントローラー
- AnswerController
- QuizController
- MailController

## route
- login -> /start -> quiz/{quiz} -> quiz/{quiz}  ... ->   /result -> mail送信
-                    answer/storeに保存                               /send_mailに保存

