<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new \Silex\Application();

$app['debug'] = true;

// теперь у нас доступен dbal в $app['db']
$app->register(new \Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_pgsql',
        'host' => 'localhost',
        'dbname' => 'rutorika',
        'user' => 'rutorika',
        'password' => 'rutorika',
    ),
));

// вот и логгер
$app->register(new \Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => '/tmp/dgr.log',
    'monolog.level' => Monolog\Logger::DEBUG,
));

// шаблонизатор
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => realpath(__DIR__ . '/../src/views'),
    'twig.options' => array(
        'cache' => '/tmp',
        'debug' => $app['debug'],
    ),
));

$app['monolog']->addInfo('views: ' . realpath(__DIR__ . '/../src/views'));

$app->get('/', function() use($app) {

    $query = $app['db']->createQueryBuilder()
        ->select("*")
        ->from('post', 'p')
        ->orderBy('created_at');
    $posts = $app['db']->executeQuery($query)->fetchAll();

    return $app['twig']->render(
        'layout.twig',
        array(
            'content' => $app['twig']->render('post/list.twig', array('posts' => $posts)),
        )
    );
});


$app->get('/blog/{id}', function($id) use ($app) {

    $query = $app['db']->createQueryBuilder()
        ->select("*")
        ->from('post', 'p')
        ->add('where', 'p.id = :id');
    $post = $app['db']->executeQuery($query, array('id' => $id))->fetch();

    return $app['twig']->render(
        'layout.twig',
        array(
            'content' => $app['twig']->render('post/show.twig', array('post' => $post)),
        )
    );
});

$app->run();