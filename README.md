EthnoDoc project source files
========================

* Source files for the EthnoDoc project, in parternship with the Graduate School of Engineering of the University of Nantes and the EthnoDoc/RADdO association

* install :

```
    $ git clone https://github.com/anhaflint/EthnoDoc.git
    $ php composer.phar install
    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:update --force
```
You should now have a working project on your machine
