# recreate tmp dir
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
echo $DIR

sudo rm -rf $DIR/../tmp
mkdir $DIR/../tmp
mkdir $DIR/../tmp/cache
mkdir $DIR/../tmp/cache/twig
mkdir $DIR/../tmp/cache/doctrine

chmod a+rw $DIR/../tmp -R