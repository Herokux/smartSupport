<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta charset=utf-8>

    <?php
			
            echo $this->Html->css('reset');
            echo $this->Html->css('reset');
            echo $this->Html->css('lib/bootstrap.min');
            echo $this->Html->css('lib/w3');
            echo $this->Html->css('lib/font-awesome/css/font-awesome.min');
            echo $this->Html->css('writer/writerTest');
            echo $this->fetch('css');
		
			echo $this->Html->script('jquery.min.js');	
			echo $this->Html->script('lib/bootstrap.min.js');	
			echo $this->Html->script('writer/writerTest.js');
	?>
    <?php echo $this->Html->meta ('favicon.ico', 'img/_webicon.png', array (
    'type' => 'icon', 'rel'=> 'icon'
    ));?>

        <title>Writer-Test Page</title>

        <script>
        </script>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $this->Html->image('full_logo_white.png'); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $userName; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link("Logout",array('controller'=>'Users','action'=>'logout'),array('escape' => false)); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <button id="violationAlert" style="display:none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Violation Detected</h4>
                </div>
                <div class="modal-body">
                    <p>You have tried to minimize this tab which is strictly prohibited during the test. Please try again.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class='intro'>

        <br>
        <h1>Welcome to the Writer Section</h1>
        <br>
        <p>Before you continue, we would like you to take a simple proficiency test
            <br>Every new Whitepanda writer has to give this basic proficiency test</p>
        <div class="alert alert-warning">
            <strong><i class="fa fa-info-circle" aria-hidden="true"></i> </strong>&nbsp; &nbsp; There will be 3 sections. Each section will contain 3 to 4 questions.<br>&nbsp; &nbsp; &nbsp; &nbsp; You wouldn't be allowed to minimize this page during the test.
        </div>
        <br>
        <!--        <button id="startButton" type="submit">Start Test</button>-->
        <h2 id="status"></h2>
    </div>

    <div class="testForm">


        <form name='test' action="../Writers/selectionTestResults" method="post">

            <div class="panel panel-green margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Determiner Test</h3>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label">1. &nbsp;</label>
                            <div>
                                <?php echo $questions['question_determiner_level1'][0];?>
                                    <select name='answer[]'>
                                        <option>your answer</option>
                                        <option value='none'>---</option>
                                        <option value='a'>a</option>
                                        <option value='an'>an</option>
                                        <option value='the'>the</option>
                                    </select>
                                    <?php echo $questions['question_determiner_level1'][1];?>
                                        <select name="answer[]">
                                            <option>your answer</option>
                                            <option value='none'>---</option>
                                            <option value='a'>a</option>
                                            <option value='an'>an</option>
                                            <option value='the'>the</option>
                                        </select>
                                        <?php echo $questions['question_determiner_level1'][2];?>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">2. &nbsp;</label>
                            <div>
                                <?php echo $questions['question_determiner_level2'][0];?>
                                    <select name='answer[]'>
                                        <option>your answer</option>
                                        <option value='none'>---</option>
                                        <option value='a'>a</option>
                                        <option value='an'>an</option>
                                        <option value='the'>the</option>
                                    </select>
                                    <?php echo $questions['question_determiner_level2'][1];?>
                                        <select name="answer[]">
                                            <option>your answer</option>
                                            <option value='none'>---</option>
                                            <option value='a'>a</option>
                                            <option value='an'>an</option>
                                            <option value='the'>the</option>
                                        </select>
                                        <?php echo $questions['question_determiner_level2'][2];?>
                                            <select name="answer[]">
                                                <option>your answer</option>
                                                <option value='none'>---</option>
                                                <option value='a'>a</option>
                                                <option value='an'>an</option>
                                                <option value='the'>the</option>
                                            </select>
                                            <?php echo $questions['question_determiner_level2'][3];?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label">3. &nbsp;</label>
                            <div>
                                <?php echo $questions['question_determiner_level3'][0];?>
                                    <select name='answer[]'>
                                        <option>your answer</option>
                                        <option value='none'>---</option>
                                        <option value='a'>a</option>
                                        <option value='an'>an</option>
                                        <option value='the'>the</option>
                                    </select>
                                    <?php echo $questions['question_determiner_level3'][1];?>
                                        <select name="answer[]">
                                            <option>your answer</option>
                                            <option value='none'>---</option>
                                            <option value='a'>a</option>
                                            <option value='an'>an</option>
                                            <option value='the'>the</option>
                                        </select>
                                        <?php echo $questions['question_determiner_level3'][2];?>
                                            <select name="answer[]">
                                                <option>your answer</option>
                                                <option value='none'>---</option>
                                                <option value='a'>a</option>
                                                <option value='an'>an</option>
                                                <option value='the'>the</option>
                                            </select>
                                            <?php echo $questions['question_determiner_level3'][3];?>
                                                <select name="answer[]">
                                                    <option>your answer</option>
                                                    <option value='none'>---</option>
                                                    <option value='a'>a</option>
                                                    <option value='an'>an</option>
                                                    <option value='the'>the</option>
                                                </select>
                                                <?php echo $questions['question_determiner_level3'][4];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="panel panel-green" id="scrambledWords">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Scrambled Words</h3>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label">1. &nbsp;</label>
                            <div>
                                <p id="scrambleHighlight1"><?php echo $questions['question_scramble_level1'][0]; ?></p>
                                <input id="scrambleInput1" type="text" name="answer[]" />
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">2. &nbsp;</label>
                            <div>
                                <p id="scrambleHighlight2"><?php echo $questions['question_scramble_level2'][0]; ?></p>
                                <input id="scrambleInput2" type="text" name="answer[]" />
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label">3. &nbsp;</label>
                            <div>
                                <p id="scrambleHighlight3"><?php echo $questions['question_scramble_level3'][0]; ?></p>
                                <input id="scrambleInput3" type="text" name="answer[]" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">4. &nbsp;</label>
                            <div>
                                <p id="scrambleHighlight4"><?php echo $questions['question_scramble_level4'][0]; ?></p>
                                <input id="scrambleInput4" type="text" name="answer[]" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="panel panel-green" id="scrambledWords">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Confusing Words</h3>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label">1. &nbsp;</label>
                            <div>
                                <h4><?php echo $questions['question_wordgame_level1'][0]; ?></h4>
                                <p class="qsn1"> &nbsp; &nbsp; •
                                    <?php echo $questions['question_wordgame_level1'][1]; ?>
                                        <select id="list1" onchange="onChngFxn('.qsn1')" name="answer[]">
                                            <option>your answer</option>
                                            <option id="opt1" value="<?php echo $questions['question_wordgame_level1'][5];  ?>">
                                                <?php echo $questions['question_wordgame_level1'][5];  ?>
                                            </option>
                                            <option id="opt2" value="<?php echo $questions['question_wordgame_level1'][6]; ?>">
                                                <?php echo $questions['question_wordgame_level1'][6]; ?>
                                            </option>
                                        </select>
                                        <?php echo $questions['question_wordgame_level1'][2]; ?>
                                            <br> &nbsp; &nbsp; •
                                            <?php echo $questions['question_wordgame_level1'][3]; ?>
                                                <select id="list2" onchange="onChngFxn('.qsn1')" name="answer[]">
                                                    <option>your answer</option>
                                                    <option id="opt1" value="<?php echo $questions['question_wordgame_level1'][5]; ?>">
                                                        <?php echo $questions['question_wordgame_level1'][5]; ?>
                                                    </option>
                                                    <option id="opt2" value="<?php echo $questions['question_wordgame_level1'][6]; ?>">
                                                        <?php echo $questions['question_wordgame_level1'][6]; ?>
                                                    </option>
                                                </select>
                                                <?php echo $questions['question_wordgame_level1'][4]; ?>
                                </p>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">2. &nbsp;</label>
                            <div>
                                <h4><?php echo $questions['question_wordgame_level2'][0]; ?></h4>
                                <p class="qsn2"> &nbsp; &nbsp; •
                                    <?php echo $questions['question_wordgame_level2'][1] ?>
                                        <select id="list1" onchange="onChngFxn('.qsn2')" name="answer[]">
                                            <option>your answer</option>
                                            <option id="opt1" value="<?php echo $questions['question_wordgame_level2'][5]; ?>">
                                                <?php echo $questions['question_wordgame_level2'][5]; ?>
                                            </option>
                                            <option id="opt2" value="<?php echo $questions['question_wordgame_level2'][6]; ?>">
                                                <?php echo $questions['question_wordgame_level2'][6]; ?>
                                            </option>
                                        </select>
                                        <?php echo $questions['question_wordgame_level2'][2] ?>
                                            <br> &nbsp; &nbsp; •
                                            <?php echo $questions['question_wordgame_level2'][3] ?>
                                                <select id="list2" onchange="onChngFxn('.qsn2')" name="answer[]">
                                                    <option>your answer</option>
                                                    <option id="opt1" value="<?php echo $questions['question_wordgame_level2'][5]; ?>">
                                                        <?php echo $questions['question_wordgame_level2'][5]; ?>
                                                    </option>
                                                    <option id="opt2" value="<?php echo $questions['question_wordgame_level2'][6]; ?>">
                                                        <?php echo $questions['question_wordgame_level2'][6]; ?>
                                                    </option>
                                                </select>
                                                <?php echo $questions['question_wordgame_level2'][4] ?>
                                </p>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label">3. &nbsp;</label>
                            <div>
                                <h4><?php echo $questions['question_wordgame_level3'][0] ?></h4>
                                <p class="qsn3"> &nbsp; &nbsp; •
                                    <?php echo $questions['question_wordgame_level3'][1] ?>
                                        <select id="list1" onchange="onChngFxn('.qsn3')" name="answer[]">
                                            <option>your answer</option>
                                            <option id="opt1" value="<?php echo $questions['question_wordgame_level3'][5] ?>">
                                                <?php echo $questions['question_wordgame_level3'][5] ?>
                                            </option>
                                            <option id="opt2" value="<?php echo $questions['question_wordgame_level3'][6] ?>">
                                                <?php echo $questions['question_wordgame_level3'][6] ?>
                                            </option>
                                        </select>
                                        <?php echo $questions['question_wordgame_level3'][2] ?>
                                            <br> &nbsp; &nbsp; •
                                            <?php echo $questions['question_wordgame_level3'][3] ?>
                                                <select id="list2" onchange="onChngFxn('.qsn3')" name="answer[]">
                                                    <option>your answer</option>
                                                    <option id="opt1" value="<?php echo $questions['question_wordgame_level3'][5] ?>">
                                                        <?php echo $questions['question_wordgame_level3'][5] ?>
                                                    </option>
                                                    <option id="opt2" value="<?php echo $questions['question_wordgame_level3'][6] ?>">
                                                        <?php echo $questions['question_wordgame_level3'][6] ?>
                                                    </option>
                                                </select>
                                                <?php echo $questions['question_wordgame_level3'][4] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <input id="scrambleInput1" type="hidden" name="shuffledQuestionID" value="<?php echo $questions['shuffledQuestionID']; ?>" />
            <br>

            <br>

            <button id="ansSub" type="submit">Submit Answers</button>
        </form>
        <br>
        <br>
        <br>






    </div>


</body>

</html>