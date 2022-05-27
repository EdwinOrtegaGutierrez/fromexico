function generatePDF() {
    var divContents = document.getElementById("PDF").innerHTML;
    var a = window.open('', '',);
    a.document.write('<html>');
    a.document.write('<title>FroMexico</title>');
    a.document.write('<body><h2>');
    a.document.write(divContents);
    a.document.write('</h2></body></html>');
    a.document.close();
    a.print();
}