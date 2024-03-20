 
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
- answers [id, user_choice, user_id, quiz_id, created_at, updated_at,correct_user_choice] (correct_user_choiceが1 は正解、0は不正解)

- quizzes [id, question, choices[],answer_number,created_at updated_at]
- users   [id, name, role, email, email_verified_at, password,remember_token, created_at, updated_at]

## コントローラー
- AnswerController
- QuizController
- MailController (mailgun使用)

## route
- login -> /start -> quiz/{quiz} -> quiz/{quiz}  ... ->   /result -> mail送信
-                    answer/storeに保存                               /send_mailに保存

