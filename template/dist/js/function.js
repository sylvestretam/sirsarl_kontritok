function back(active,future)
{
    $(active).addClass('invisible');
    $(future).removeClass('invisible');
}

function format(number)
{
    var options = {maximumFractionDigits:2};
    return number.toFixedDown(2);
}

function getFT(fts,matricule)
{
    return fts.find(element=> element.employee == matricule);
}

function getProspect(prospects,prospection_id)
{
    return prospects.find(element=> element.prospection_id == prospection_id);
}

function getPV(pvs,code_pv)
{
    return pvs.find(element=> element.code_pv == code_pv);
}


function getReception(receptions,reception_id)
{
    return receptions.find(element=> element.reception_id == reception_id);
}

function getSortieFT(sortiesFT,sortie_id)
{
    return sortiesFT.find(element=> element.sortie_id == sortie_id);
}

function getRetour(retours,retour_id)
{
    return retours.find(element=> element.retour_id == retour_id);
}

function getSortiePV(sortiesPV,sortie_id)
{
    return sortiesPV.find(element=> element.sortie_id == sortie_id);
}

function getVenteFT(ventesFT,vente_id)
{
    return ventesFT.find(element=> element.vente_id == vente_id);
}

function getPresence(presences,date_jour)
{
    return presences.find(element=> element.date_jour == date_jour);
}


let lignes;
let activation = {};

function addLigneActivation()
{
    let article = $('#article').val();
    let quantite = $('#quantite').val();
    let unite = $('#unite').val();
    let valeur = $('#valeur').val();

    if(quantite =="")
    {
        $('.txt_message_error').html("Veuillez remplir tous les champs");
        $('.sect_error').removeClass('invisible');
    }
    else
    {
        activation[article] = {"quantite":quantite,"unite":unite,"valeur":valeur};
        
        $('.activation').val( JSON.stringify(activation) );
        writeLigneActivation(activation,'.ligne_activation');
    }
}

function removeLigneActivation(idligne)
{
    $(`#${idligne}`).addClass("invisible");
    delete activation[idligne];
    // alert(Object.keys(activation).length);
    if( Object.keys(activation).length > 0)
        $('.activation').val( JSON.stringify(activation) );
    else
        $('.activation').val( "" );
    
}

function addLigneDevisMod()
{
    let description = $('#description_mod').val();
    let montant = $('#montant_mod').val();

    if(description =="" || montant =="")
    {
        $('.txt_message_error').html("Veuillez remplir tous les champs");
        $('.sect_error').removeClass('invisible');
    }
    else
    {
        devis[description] = montant;
        $('.devis').val( JSON.stringify(devis) );
        writeLigneDevis(devis,'.list_ligne_devis_mod');
    }
}

function writeLigneActivation(lignes,tbody)
{
    let text ="";
    for (const element in lignes) {
        let txt = 
            `<tr id="${element}">
                <td> ${element} </td>
                <td> ${lignes[element].quantite} </td>
                <td> ${lignes[element].unite} </td>
                <td> ${lignes[element].valeur} </td>
                <td> 
                    <button type="button" onclick="removeLigneActivation('${element}')"> 
                        <i class="fas fa-trash" aria-hidden="true"></i> 
                    </button>
                </td>
            </tr>`;
        text = text.concat(txt); 
    }
    
    $(tbody).html(text);
}