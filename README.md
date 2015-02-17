EthnoDoc project source files
========================

* Source files for the EthnoDoc project, in parternship with the Graduate School of Engineering of the University of Nantes and the EthnoDoc/RADdO association

project installation :
---------

### if you do not have composer installed on your machine :
```
    $ php -r "readfile('https://getcomposer.org/installer');" | php
```
### then
```
    $ git clone https://github.com/anhaflint/EthnoDoc.git
    $ php composer.phar install
    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:update --force
```

Java installation :
---------------------
* Download the Java JDK:
```
    http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html
```
* Create the JAVA_HOME environment variable directing to the JAVA/jre
  directory in your Program Files or Program Files (x86) directory
* Create the CLASSPATH environment variable :
```
    %JAVA_HOME%\lib
```
* Edit the PATH variable to add the following :
```
    %JAVA_HOME%\bin
```

Elasticsearch installation :
----------------------------

* Downlad elasticsearch at
```
    http://www.elasticsearch.org/overview/elkdownloads/
```
* Unzip the zip file

Run Elasticsearch :
-------------------------
* Go to your elasticsearch directory and then :
```
    $ elasticsearch\bin\elasticsearch.bat
```
* Elasticsearch should now run on your machine
