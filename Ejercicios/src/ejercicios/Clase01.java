package ejercicios;

import java.util.Scanner;
import java.io.File;

public class Clase01 {

	public static void main(String[] args) {
		Scanner scan = new Scanner(System.in);
		Scanner scanF;
		
		String path = "datos/list.txt";
		int maxReg = Integer.parseInt(scan.nextLine());
		File file = new File(path);
		
		String[] content;
		Producto[] earphones = new Producto[maxReg];
		
		try {
			scanF = new Scanner(file);
			for ( int i = 0; i < earphones.length && scanF.hasNextLine(); i++) {
				content = scanF.nextLine().split(";");
				earphones[i] = new Producto(content[0], content[1], content[2], Float.parseFloat(content[3]), Integer.parseInt(content[4]), "Auriculares", false);
			}
			scanF.close();
			scan.close();
		}catch(Exception ex) {
			ex.printStackTrace();
		}
	}
}