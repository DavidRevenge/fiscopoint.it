<?php

$operatoriCed = getOperatoriCedResult();

$opced_array = [];
$opced_servizio_array = [];
while ($row = $operatoriCed->fetch_assoc()) {
    $opced_array[] = $row;
}

if (isset($_GET["id"])) {
    $operatoriCedServizio = getOperatoreCedServizi($_GET["id"]);
    if ($operatoriCedServizio->num_rows > 0) {
        while ($row_opced_servizio = $operatoriCedServizio->fetch_assoc()) {
            $opced_servizio_array[$row_opced_servizio['id_servizio']] = $row_opced_servizio;
        }

    }
}

$_SESSION['opced_servizio_array'] = $opced_servizio_array;

if (! $mn_servizi || $mn_servizi->num_rows === 0) {
    echo alert('danger', ' Popolare la tabella servizi cliccando sul bottone "Popola tabelle" sottostante');
} else {

    while ($value = $mn_servizi->fetch_assoc()) {

        $isChecked = isset($servizi_checked) && isset($servizi_checked[$value['id']]);

        $tmp = ($isChecked) ? "checked" : "";
        echo "
            <div class=\"form-check col-md-3\">
                <input class=\"form-check-input servizioCheckbox\" type=\"checkbox\" id=\"op{$value['id']}\" name=\"op{$value['id']}\" $tmp >
                <label class=\"form-check-label\" for=\"op{$value['id']}\">
                    {$value["nome"]};
                </label>
            ";

        $opc_class = ($isChecked) ? '' : 'd-none';

        echo '

        <div class="opCedBox col-12 m-2 ' . $opc_class . '">
            <label for="opced_' . $value['id'] . '">Operatore CED:</label>

            <select class="form-select m-2 w-75" style="margin-left: 0.5rem;" name="opced_' . $value['id'] . '" id="opced_' . $value['id'] . '">
              <option value="false">Nessuno</option>';

        foreach ($opced_array as $row) {
            $optionSelected = '';
            if (isset($opced_servizio_array[$value['id']])) {
                $operatore_ced_servizio = $opced_servizio_array[$value['id']]['id_operatore_ced'];
                if ($operatore_ced_servizio === $row['id']) {
                    $optionSelected = 'selected';
                } else {
                    $optionSelected = '';
                }

            }

            echo '<option value="' . $row['id'] . '" ' . $optionSelected . '>' . $row['Username'] . '</option>';
        }
        echo '
            </select>
        </div>

        ';
        echo '</div>';
    }

}
