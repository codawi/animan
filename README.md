# AniMan
AniManはアニメと漫画のトレンドランキングサービスです。<br>
Twitterの単語を分析し、人気の作品をランキング形式で表示します。<br>
会員登録を行うと気になる作品をブックマークしたり、感想を書くことができます。
<img width="1049" alt="スクリーンショット 2022-10-29 10 13 25" src="https://user-images.githubusercontent.com/105541558/198755254-d4333d8b-d604-4e8d-8249-d7dbb07c33f4.png">

# URL
https://animan-am.com/

# 開発背景
**解決したい課題**<br>
昨今はスマホ一つで無限に時間を潰せてしまう娯楽バブル時代です。<br>
ユーザーの時間も無限ではなく、大量のコンテンツが可処分時間の奪い合いが起き
ています。<br>
限りある時間の中でせっかくなら最大限面白いコンテンツに触れたいと思う人もいでしょう。<br>
私はSNSをメインに話題のアニメや漫画を知るのですが、いつの間にか情報を収集
する時間の方が圧倒的に多くなり、肝心の作品に触れる時間があまりないといった
ことがよくありました。

**解決方法**<br>
最近話題の漫画やアニメをTwitterのツイートから分析しランキング形式で毎日手軽に見れるサイトを作る。<br>
一目で最近の流行作品が分かるようにしてユーザーの作品を見る以外の時間の無駄
を無くす。

# 使用技術
**フロントエンド**
- Vue,js 3.2.33
- TailwindCSS 3.0.18

**バックエンド**
- PHP 8.0.2
- Laravel 9.11
  - Inertia.js(Vueと連携してSPA開発) 0.11.0
  - LaravelBreeze(ログイン認証) 1.9
  - Goutte(スクレイピングライブラリ) 2.2
  - Socialite(GoogleAPIでログイン) 5.5
  - Guzzle(GrapQLAPIを利用) 7.2
  - TwitterOAuth(TwitterAPIを利用して作品を検索) 4.0

**インフラ**<br>
- AWS
  - EC2
  - VPC
  - RDS
  - Route53
  - ALB
  - SES
- Apach
- MySQL

**開発環境**
- Docker
- Laravel sail
- GitHub
- VSCode
- PHPMyAdmin
- laravel-graphql-playground
- MailHog

# 機能一覧
- SPA対応
- ランキング表示(アニメ,漫画)
- ユーザー登録、ログイン(LaravelBreeze, GoogleAPI)
  - ゲストログイン機能
  - ユーザー情報変更、削除
  - メール認証
- ブックマーク
- レビュー投稿,一覧,編集,削除
  - 星評価(vue-star-rating)
- 作品検索
- 作品配信URL,公式サイトURL

# ER図
![ER図 drawio](https://user-images.githubusercontent.com/105541558/198505024-bca5f1a8-161e-4f3c-8552-aa8b4546312a.png)

# AWS構成図
![aws](https://user-images.githubusercontent.com/105541558/198754936-574fda46-ac73-4daf-b84c-b54946410df6.png)
