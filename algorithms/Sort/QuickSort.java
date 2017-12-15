/**
 * 快速排序算法-从小到大
 * yangshengkai
 * 时间复杂度-最佳：平均：最差 = O(n logn):O(n logn):O(n^2)
 * 空间复杂度-O(logn)
 * 不稳定排序
 */
class QuickSort{

    //排序算法
    public static void quickSoftAlg(int[] arr, int left, int right){
        int i = left, j = right, temp;
        int middle;

        middle = arr[(i + j) / 2];
        do{
            //从左查找比中间值大的数
            while (arr[i] < middle && i < right){
                i++;
            }
            //从右查找比中间值小数
            while (arr[j] > middle && j > left){
                j--;
            }
            //交换两边的数值
            if (i <= j){
                temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
                i++;
                j--;
            }
        }while (i <= j);

        if (i < right){
            quickSoftAlg(arr, i, right);
        }
        if (j > left){
            quickSoftAlg(arr, left, j);
        }

    }
    //主方法
    public static void main(String[] str){
        QuickSort quickSort = new QuickSort();
        int[] testArr = new int[]{7,9,6,1,3,65,68,2,18,96,23,15};
        quickSort.quickSoftAlg(testArr, 0, testArr.length - 1);
        for (int m = 0; m < testArr.length; m++){
            System.out.print(testArr[m] + " ");
        }
    }
}