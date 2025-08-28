import java.util.InputMismatchException;
import java.util.Scanner;

public class IndexProblems {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        // Input string
        System.out.print("Enter a string: ");
        String testString = in.nextLine();

        if (testString.isEmpty()) {
            System.out.println("Error: String kosong, tidak bisa diproses.");
            return;
        }

        int start = -1;
        int end = -1;

        try {
            System.out.print("Enter a start index: ");
            start = in.nextInt();

            System.out.print("Enter an end index: ");
            end = in.nextInt();
        } catch (InputMismatchException e) {
            System.out.println("Error: Indeks harus berupa bilangan bulat (integer).");
            return;
        }

        // Validasi indeks
        if (start < 0 || end < 0) {
            System.out.println("Error: Indeks tidak boleh negatif.");
            return;
        }
        if (start > end) {
            System.out.println("Error: Start index tidak boleh lebih besar dari end index.");
            return;
        }
        if (end > testString.length()) {
            System.out.println("Error: End index melebihi panjang string (" + testString.length() + ").");
            return;
        }

        // Jika semua valid → ambil substring
        String result = testString.substring(start, end);
        System.out.println("Your substring is: " + result);
    }
}
