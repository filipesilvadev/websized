<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'websized');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ka7D+3*;T]s~;|I)8/+Rr=dAJj3:v[%j2@m4(:bL@inSw2#+SaGkP2;o;W6}0(ZY');
define('SECURE_AUTH_KEY',  'v!aJjcAS3$ @6-r4yCB5;),hGuf;e+~I+HC7B]kDAJdOmpYG}y!Q4#g~{Jy84{EG');
define('LOGGED_IN_KEY',    'kNw{}sx8(#R::.GptE3mq3&&!,v<:_|VQ9y:QGmvs)1~CY&PH51:<*wjNJp-g#J?');
define('NONCE_KEY',        '&e/=Ev[KCud5$XDkAcPgl}8Vm,bwO9)g145qgwa~O&`h9DpljTpkDGy:go$4THAK');
define('AUTH_SALT',        '2&`|e!dEx@CvU##@Fn^]-mHMTa,o>NAHB70:2,|sHJx65|P/r+]NS=?$6fwOZiar');
define('SECURE_AUTH_SALT', 'fRz#pEU yj<B<`&*_eJ|{V~Fks6fa<Gf;F@8Xh|+n,lgU_/)d5Bijt9 >cDuZ^9{');
define('LOGGED_IN_SALT',   '?)-okH`p?qr}RYm}*91+/cK|j>QRGM:wT`Zj>k!BWw(X9+$pnnYX4tY.e(.}]42^');
define('NONCE_SALT',       'CpHxDzZqdCTFCC};7k-fCU2YZ|=~Q>i|j+I7~_9igD3Qpq~ xSN_ OPnf<Btg,b}');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
add_filter('show_admin_bar', '__return_false');