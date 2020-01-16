<nav id="main" class="no-print">
    <button>Vorherige Woche</button>
    <label for="fieldWeek">Woche vom:</label>
    <input id="fieldWeek" type="date" name="week" value="<?= date('Y-m-d') ?>">
    <button>Nächste Woche</button>
    <button onclick="App.logout();">Logout</button>
</nav>

<form id="sheetForm" action="?" method="post">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="data[document][userId]" value="14">
    <input type="hidden" name="data[document][userFirstname]" value="John">
    <input type="hidden" name="data[document][userLastname]" value="Doe">
    <input type="hidden" name="data[document][year]" value="2020">
    <input type="hidden" name="data[document][number]" value="12">
    <input type="hidden" name="data[document][start]" value="2019-12-10">

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
                <td style="border-bottom: 1px solid black;">12</td>
                <td colspan="2">Für die Woche vom</td>
                <td style="border-bottom: 1px solid black;">10.12.2020</td>
                <td>bis</td>
                <td style="border-bottom: 1px solid black;">17.12.2020</td>
            <tr>
                <td colspan="2"></td>
                <td colspan="5">Ausbildungsjahr 2020</td>
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
                <input type="hidden" name="data[sheet][<?= $i ?>][id]" value="">
                <input type="hidden" name="data[sheet][<?= $i ?>][date]" value="">
                <tr data-day-id="<?= $i+1 ?>" class="section">
                    <td rowspan="6" class="labelWrapper">
                        <div class="label"><?= FrontendUtils::getGermanDayName($i) ?></div>
                        <textarea name="data[sheet][<?= $i ?>][description]" class="area area-description <?= ($data['sheet'][$i]['department'] == 0) ? 'marked':'' ?>"><?= $data['sheet'][$i]['description'] ?></textarea>
                        <textarea name="data[sheet][<?= $i ?>][hours]" class="area area-hours"><?= $data['sheet'][$i]['hours'] ?></textarea>
                        <select name="data[sheet][<?= $i ?>][department]" class="select-department no-print">
                            <?php for ($k = 0; $k < count($departmentList); $k++) : ?>
                                <option value="<?= $departmentList[$k]['id'] ?>" <?= ($data['sheet'][$i]['department'] == $departmentList[$k]['id']) ? 'selected="selected"' : '' ?>><?= $departmentList[$k]['name'] ?></option>
                            <?php endfor; ?>
                        </select>
                        <?php for ($k = 0; $k < count($departmentList); $k++) : ?>
                            <?php if($data['sheet'][$i]['department'] == $departmentList[$k]['id']) : ?>
                                <div style="padding: 0 5px" class="select-department print"><?= $departmentList[$k]['name'] ?></div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </td>
                    <td><div class="line-spacer"></div></td>
                    <td><div class="line-spacer"></div></td>
                    <td rowspan="5"><input name="data[sheet][<?= $i ?>][total_hours]" class="totalHours" type="number" value="<?= $data['sheet'][$i]['total_hours'] ?>"></td>
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
                                <input id="notice" style="position: absolute;top: 17px;left: 0;" type="text" name="data[document][notice]" value="<?= $data['document']['notice'] ?>">
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