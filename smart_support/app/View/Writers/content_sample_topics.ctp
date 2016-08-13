<?php
    $shuffledNumbers = range(0, 9);
    shuffle($shuffledNumbers);
?>
    <div class="gap10"></div>
    <div class="row center-ali">
        <h5>Choose a topic and write about it in 150 words.</h5>

        <div id="topicBox">
            <div>
                <input ng-click="topicSelected('<?php echo $ShuffledContentTopics[$shuffledNumbers[0]]['WriterSamplecontentTopic']['topic_id']; ?>')" type="radio" name="topic" id="topic1" class="radio" />
                <label for="topic1">
                    <?php echo $ShuffledContentTopics[$shuffledNumbers[0]]['WriterSamplecontentTopic']['topic']; ?>
                </label>
            </div>
            <div>
                <input ng-click="topicSelected('<?php echo $ShuffledContentTopics[$shuffledNumbers[3]]['WriterSamplecontentTopic']['topic_id']; ?>')" type="radio" name="topic" id="topic2" class="radio" />
                <label for="topic2">
                    <?php echo $ShuffledContentTopics[$shuffledNumbers[3]]['WriterSamplecontentTopic']['topic']; ?>
                </label>
            </div>
            <div>
                <input ng-click="topicSelected('<?php echo $ShuffledContentTopics[$shuffledNumbers[5]]['WriterSamplecontentTopic']['topic_id']; ?>')" type="radio" name="topic" id="topic3" class="radio" />
                <label for="topic3">
                    <?php echo $ShuffledContentTopics[$shuffledNumbers[5]]['WriterSamplecontentTopic']['topic']; ?>
                </label>
            </div>
        </div>

        <div class="gap30"></div>
        <div class="row">
            <div class="input-field col s12">
                <textarea ng-model="contentSample" id="textarea1" class="materialize-textarea validate" length="120"></textarea>
                <label for="textarea1">Place your sample here</label>
            </div>
        </div>
        <br>
        <br>
        <a  ng-click="submitAreaSample(contentSample)" class="waves-effect waves-light btn"><i class="material-icons left">send</i>Submit Sample</a>
    </div>

 