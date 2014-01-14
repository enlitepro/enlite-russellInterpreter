<?php
/**
 * The parse and interpreter manager
 *
 * @category   Manager
 * @package    EnliteRusselInterpreter
 * @author     Vladimir Struts <Sysaninster@gmail.com>
 * @license    LICENSE.txt
 * @date       13.01.14
 */

namespace EnliteRussellInterpreter;


use EnliteRussellInterpreter\Options\InterpreterOptions;
use RussellInterpreter\Interpreter;
use RussellInterpreter\Lexer;
use RussellInterpreter\ParserTree;

class InterpreterManager {

    /**
     * The options
     *
     * @var InterpreterOptions
     */
    protected $options;

    /**
     * The extensionsManager
     *
     * @var ExtensionsManager
     */
    protected $extensionsManager;

    /**
     * The defaultExtensions
     *
     * @var array
     */
    protected $defaultExtensions = [
        'assignment' => array('assignment', 'assign'),
        'summation' => array('sum', 'summation'),
        'subtraction' => array('minus', 'subtraction'),
        'division' => array('div', 'division'),
        'multiplication' => array('multi', 'multiplication'),
        'random' => array('rand', 'random'),
        'array' => array('arr', 'array'),
        'cycle' => array('cycle', 'while'),
        'until' => array('until'),
        'true' => array('isTrue', 'true'),
        'false' => array('isFalse', 'false'),
        'increment' => array('increment'),
        'decrement' => array('decrement'),
        'equal' => array('equal'),
        'not_equal' => array('notequal', 'not_equal', 'not_equal'),
        'conditional_operator' => array('if'),
        'conjunction' => array('disjunction', 'and'),
        'disjunction' => array('disjunction', 'or'),
        'negation' => array('negation', 'not'),
        'plural' => array('plural'),
        'concatenation' => array('concatenation', 'concat'),
        'greater' => array('greater', 'gt'),
        'greater_or_equal' => array('greater_or_equal', 'gteq'),
        'less' => array('less', 'ls'),
        'less_or_equal' => array('less_or_equal', 'lseq'),
        'modulo' => array('modulo', 'mod'),
        'random_argument' => array('random_argument', 'rand_arg'),
        'square_root' => array('square_root', 'sqrt'),
        'exponential' => array('exponential', 'pow'),
    ];

    /**
     * The lexer
     *
     * @var Lexer
     */
    protected $lexer;

    /**
     * The interpreter
     *
     * @var Interpreter
     */
    protected $interpreter;

    /**
     * @param array $defaultExtensions
     */
    public function setDefaultExtensions($defaultExtensions)
    {
        $this->defaultExtensions = $defaultExtensions;
    }

    /**
     * @return array
     */
    public function getDefaultExtensions()
    {
        return $this->defaultExtensions;
    }

    /**
     * @param \EnliteRussellInterpreter\ExtensionsManager $extensionsManager
     */
    public function setExtensionsManager($extensionsManager)
    {
        $this->extensionsManager = $extensionsManager;
    }

    /**
     * @return \EnliteRussellInterpreter\ExtensionsManager
     */
    public function getExtensionsManager()
    {
        return $this->extensionsManager;
    }

    /**
     * @param \RussellInterpreter\Interpreter $interpreter
     */
    public function setInterpreter($interpreter)
    {
        $this->interpreter = $interpreter;
    }

    /**
     * @return \RussellInterpreter\Interpreter
     */
    public function getInterpreter()
    {
        if (is_null($this->interpreter)) {
            $this->interpreter = new Interpreter();
            $this->addExtensionsToInterpreter();
        }
        return $this->interpreter;
    }

    /**
     * Add extensions to interpreter
     */
    public function addExtensionsToInterpreter()
    {
        $interpreter = $this->getInterpreter();
        $extensions = $this->getOptions()->getExtensions();

        if ($this->getOptions()->getUseDefaultExtensions()) {
            $extensions = array_merge($this->getDefaultExtensions(), $extensions);
        }

        if (count($extensions)) {
            foreach ($extensions as $name => $synonyms) {
                $interpreter->addExtension(
                    $synonyms,
                    $this->getExtensionsManager()->get($name)
                );
            }
        }
    }

    /**
     * @param \RussellInterpreter\Lexer $lexer
     */
    public function setLexer($lexer)
    {
        $this->lexer = $lexer;
    }

    /**
     * @return \RussellInterpreter\Lexer
     */
    public function getLexer()
    {
        if (is_null($this->lexer)) {
            $this->lexer = new Lexer();
        }
        return $this->lexer;
    }

    /**
     * @param \EnliteRussellInterpreter\Options\InterpreterOptions $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return \EnliteRussellInterpreter\Options\InterpreterOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->getInterpreter()->getErrors();
    }

    /**
     * Get variables
     *
     * @return array
     */
    public function getVariables()
    {
        return $this->getInterpreter()->getVariables();
    }

    /**
     * Run script from a string
     *
     * @param string $scriptCode
     * @param array $withVariables
     * @return bool
     */
    public function runScript($scriptCode, $withVariables = [])
    {
        $this->getLexer()->setParserTree(
            new ParserTree()
        );
        $tree = $this->getLexer()->code($scriptCode);

        $interpreter = $this->getInterpreter();
        $interpreter->clear();
        $interpreter->setVariables($withVariables);
        $result = $interpreter->execute($tree);

        return $result;
    }

} 