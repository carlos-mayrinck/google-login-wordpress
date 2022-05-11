<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'tema_teste_db' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^}>=<@-XhSTnsam)&eOcXGX2$_ .WDw<f(1NcC~M<v/cHW-AaO(ysd,|CYFG@@tz' );
define( 'SECURE_AUTH_KEY',  ')||KF2llxot?EcGq*Df7 ]Ilw%^RXogLb8`GmdK^}nXD7[t&{eGg7DB]M(0dw|<6' );
define( 'LOGGED_IN_KEY',    'CEI@iu%.ez{q2`Z>eIrTDuc!Un:(;[N.Lg:O>eDwoMx@iR{I6a5jRZb,_b5oiU v' );
define( 'NONCE_KEY',        '~a-:Z6V[3>G+;|BKz{I?ad-xBT(3%)/}{sIDtMPz}}ya,@7f:UJn27:Rm +L{L(`' );
define( 'AUTH_SALT',        'Jb2#Q>xfzf+.|cFN`pzQD~g<R?}FlBWXx_7i9p~NVHiX{l3P4Y{L=|g([0DjxjVF' );
define( 'SECURE_AUTH_SALT', ':1Oa8epaE8]IWK*u1~M|o_oJt)7MiHsz`%D]CntD=#Mpjvh m*SZ9=VLnB20&;X9' );
define( 'LOGGED_IN_SALT',   'N.X@ob,erp5l-DE(y G,[>vB_bVtqrd9qGoW%S]]u/ea4>C|/(k.m/nypIai59%)' );
define( 'NONCE_SALT',       '~.4qZ*bdyOfouOO_/Ijm1!],@q8D>%XX2b!JdE]SFWX-1McRxM(6J+].Ad@%~u7<' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
