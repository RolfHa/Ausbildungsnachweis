<nav id="main" class="no-print">
    <form id="datePicker" action="?" method="get">
        <input id="dateField" type="hidden" name="date" value="<?= $currentWeek ?>">
    </form>
    <button onclick="App.goto('<?= $previousWeek ?>');">Vorherige Woche</button>
    <label for="datePickerCalendar">Woche vom:</label>
    <input id="datePickerCalendar" type="date" name="date" value="<?= $currentWeek ?>">
    <button onclick="App.goto('<?= $nextWeek ?>');">Nächste Woche</button>
    <button onclick="App.logout();">Logout</button>
</nav>

<form id="sheetForm" action="?" method="post">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="data[user][id]" value="<?= FrontendUtils::getUserId() ?>">
    <input type="hidden" name="currentWeekDate" value="<?= $currentWeek ?>">

    <div style="width: 700px; margin: 0 auto;">

        <table id="headTable">
            <tr>
                <td width="25%"></td>
                <td width="25%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Name</td>
                <td colspan="4" style="border-bottom: 1px solid black"><?= FrontendUtils::getUserFullName() ?></td>
            </tr>
            <tr>
                <td><strong>Ausbildungnachweis Nr:</strong></td>
                <td style="border-bottom: 1px solid black;"><?= FrontendUtils::getUserSheetNumber($currentWeek) ?></td>
                <td colspan="2">Für die Woche vom</td>
                <td style="border-bottom: 1px solid black;"><?= FrontendUtils::getWeekStartDate($currentWeek) ?></td>
                <td>bis</td>
                <td style="border-bottom: 1px solid black;"><?= FrontendUtils::getWeekEndDate($currentWeek) ?></td>
            <tr>
                <td colspan="2"></td>
                <td colspan="5">Ausbildungsjahr: <?= FrontendUtils::getUserEducationYear($currentWeek) ?></td>
            </tr>
        </table>

        <table>
            <tr>
                <th width="10%">Tag</th>
                <th width="42%">Ausgeführte Arbeiten, Unterricht usw.</th>
                <th width="10%">Einzel-<br/>stunden</th>
                <th width="10%">Gesamt-<br>stunden</th>
                <th width="28%">Ausbildungs-Abteilung</th>
            </tr>

            <?php for ($i = 0; $i < count($data['sheet']); $i++) : ?>
                <input type="hidden" name="data[sheet][<?= $i ?>][id]" value="<?= $data['sheet'][$i]['id'] ?>">
                <input type="hidden" name="data[sheet][<?= $i ?>][dateOfDay]" value="<?= $data['sheet'][$i]['dateOfDay'] ?>">
                <tr data-day-id="<?= $i+1 ?>" class="section">
                    <td rowspan="6" class="labelWrapper">
                        <div class="label"><?= FrontendUtils::getGermanDayName($i) ?></div>
                        <textarea name="data[sheet][<?= $i ?>][description]" class="area area-description <?= ($data['sheet'][$i]['modulId'] == 1) ? 'marked':'' ?>"><?= $data['sheet'][$i]['description'] ?></textarea>
                        <textarea name="data[sheet][<?= $i ?>][hours]" class="area area-hours"><?= $data['sheet'][$i]['hours'] ?></textarea>
                        <select name="data[sheet][<?= $i ?>][modulId]" class="select-department no-print">

                            <?php /** @var Modul $modul */
                            foreach($moduleList as $modul) : ?>
                                <option value="<?= $modul->getId() ?>" <?= ($data['sheet'][$i]['modulId'] == $modul->getId()) ? 'selected="selected"' : '' ?>><?= $modul->getName() ?></option>
                            <?php endforeach; ?>

                        </select>
                        <?php /** @var Modul $modul */
                        foreach($moduleList as $modul) : ?>
                            <?php if($data['sheet'][$i]['modulId'] == $modul->getId()) : ?>
                                <div style="padding: 0 5px; line-height: 1.3;" class="select-department print"><?= $modul->getName() ?></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td rowspan="5"><div class="totalHours"><?= $data['sheet'][$i]['totalHours'] ?></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endfor; ?>

            <tr class="no-border">
                <td colspan="3"
                    style="text-align: right; font-weight: bold; border-right: 2px solid black;padding-right: 5px;">
                    Gesamtstunden
                </td>
                <td style="text-align:center; border-right: 2px solid black;" id="overallHours"></td>
                <td></td>
            </tr>

            <tr style="border:none;">
                <td colspan="5" style="border:none; padding: 0">

                    <table style="width: 100%">
                        <tr style="border-top:2px solid black;">
                            <td width="54%" style="padding-bottom: 15px; position: relative;">
                                <strong>Besondere Bemerkungen</strong> Auszubildender
                                <input type="hidden" name="data[notice][id]" value="<?= $data['notice']['id'] ?>">
                                <input type="hidden" name="data[notice][noticeDate]" value="<?= $data['notice']['noticeDate'] ?>">
                                <input id="notice" style="position: absolute;top: 17px;left: 0;" type="text" name="data[notice][notice]" value="<?= $data['notice']['notice'] ?>">
                            </td>
                            <td width="46%" style="padding-bottom: 15px">Ausbildender bzw. Ausbilder</td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 15px"><strong>Für die Richtigkeit</strong></td>
                            <td style="padding-bottom: 15px"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-bottom: none">Datum Unterschrift des Auszubildenden Datum
                                Unterschrift des Ausbildenden bzw. Ausbilders
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

</form>
<script type="text/javascript" src="static/sheet.js"></script>