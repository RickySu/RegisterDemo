報名系統後台DEMO

安裝步驟

執行

$./install.sh

$./symfony configure:database 'mysql:host=localhost;dbname=Database_NAME'
DBAccount DBPassword

$./symfony doctrine:build --all   #會跳出確認寫入db，請選擇y

$./symfony doctrine:data-load     #初始預設資料

$./symfony guard:create-user --is-super-admin email_address username
password     #建立登入帳號


預設後台首頁
網頁根目錄位於 web/
http://your_host/backend.php/

