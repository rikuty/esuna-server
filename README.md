# esuna-server

# 環境準備
- php 7.2x
- mysql 5.7x (本番は aws aurora)

# セットアップ

composerもインストールその後以下を実行しパッケージを入れる

`$ composer install`

.env.sampleをコピーし.envのファイルをアプリケーション直下に作成
```
# db 設定
DB_HOST="DB ホスト名"
DB_NAME="DB名"
DB_USER="DB ユーザー名"
DB_PASS="DB パスワード"
DB_PORT="DB ポート"

```

本番は ./scripts/after_install.sh で環境変数を自動セット(aws systems manager を用いてます)
本番は `prod`.パラメータ で systems manager側でセットすれば用いる

# デプロイ
codedeployを使用
